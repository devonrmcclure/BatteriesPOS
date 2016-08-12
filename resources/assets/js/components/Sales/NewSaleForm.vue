<template>
<form method="POST" id="new-sale-form" action="http://api.batteriespos.dev/v0/sales">
    <input  type="hidden" name="api_token" value="{{location.api_token}}"/> 
    <input type="hidden" name="customer-id" v-model="customer.id"/>
    Location: {{ location.name }} <br />
    Sold By: <input type="text" name="sale-rep" value="{{rep.first_name}}" readonly/><br />
    
    Date: {{ date | moment }} <br />
    Total: $<input type="text" name="sale-total" value="{{total}}" readonly/><br />
    Invoice: <input type="text" name="sale-invoice" value="{{invoice}}" readonly/><br />
    <input class="sku" id="sku" v-model="sku" @change="addProduct()" placeholder="Sku" tab-index="1">  <input v-model="quantity" @change="calculatePrice()" placeholder="Quantity">
    <table class="products">
        <tr>
            <th></th>
            <th>SKU</th>
            <th>Description</th>
            <th>QTY</th>
            <th>Discount %</th>
            <th>Unit $</th>
            <th>Extended</th>
            <th>PST</th>
            <th>GST</th>
            <th>Total</th>

        </tr>

        <tr v-for="product in products">
            <td @click="removeProduct(product, $index)">X</td>
            <td><input type="text" name="sku[]" v-model="product.sku"/></td>
            <td><input type="text" name="description[]" value="{{ product.description }}" readonly/></td>
            <td><input type="text" name="quantity[]" v-model="prices[$index].quantity" @change="updatePrice($index)"/></td> <!-- This needs to be completely reworked and use something like onChange=getPrices($index)-->
            <td><input type="text" name="discount[]" v-model="prices[$index].discount" @change="updatePrice($index)"/></td>
            <td><input type="text" name="unit-price[]" v-model="product.unit_price" @change="updatePrice($index)"/></td>
            <td><input type="text" name="extended[]" v-model="prices[$index].extended" readonly/></td>
            <td><input type="text" name="pst[]" v-model="prices[$index].pst" readonly/></td>
            <td><input type="text" name="gst[]" v-model="prices[$index].gst" readonly/></td>
            <td><input type="text" name="sku-total[]" v-model="prices[$index].sku_total" readonly/></td>
        </tr>

    </table>
    <select name="invoice-comment" v-model="invoice_comment">
        <option selected>Returns may be subject to a 25% restocking fee.</option>
        <option>Small appliance repairs have a 30 day service warranty.</option>
        <option>Thank you for your business.</option>
        <option>To ensure quality, batteries are a non-refundable item.</option>
    </select>
     
</form>

<span class="payment-method">
   <button name="payment-method" value="Cash" @click="completeSale('Cash')">Cash</button>
</span>
</template>


<script>
    import Vue from 'vue';
    import Moment from 'moment';

    export default Vue.extend({

        props: ['show', 'rep', 'location', 'invoice', 'customer', 'prices', 'products'],

        components: {},

        data() {
            return {
                sku: '',
                quantity: '',
                invoice_comment: '',
                paymentMethod: '',
                print: false,
                date: new Date(),
            }
        },

        ready() {
            //this.getCustomer();
            // TODO: Get value of PST and GST from a "settings" table
        },

        computed: {
            total: function() {
                var total = 0;
                for(var i = 0; i < this.prices.length; i++)
                {
                    total += Number(this.prices[i]['sku_total']);
                }

                return Number(total).toFixed(2);

            }
        },

        methods: {
            close() {
                this.clearData();
                this.show = false;
                this.$refs.cust.getDefaultCustomer();
            },

            clearData() {
                this.products = [];
                this.prices = [];
                this.sku = '';
                this.quantity = '';
            },

            getProduct(sku) {
                  var url = 'http://api.batteriespos.dev/v0/inventory?sku=' + sku;

                  this.$http.get(url, {api_token: this.location.api_token}).then(function(response) {
                      this.products.push(response.data.data[0]);

                  }, function(response) {
                      this.$set('error', 'The Rep does not exist!');
                // error callback
                  });
            },

            addProduct() {
                if(!(this.products.length - this.prices.length) < 1)
                {
                    this.sku = '';
                    alert('Please enter a quantity for already entered product!');
                    return;
                }
                this.getProduct(this.sku);
                this.sku = '';

            },

            calculatePrice() {
                // Calc price if item just added
                // Update price based on index and discount/manually set unit_price
                // 
                if(!this.products.length > this.prices.length) {
                    this.sku = '';
                    this.quantity = '';
                }
                
                var index = this.products.length - 1;

                var extended = (this.quantity * this.products[index]['unit_price']).toFixed(2);

                var pst = this.calculatePST(this.products[index], extended);
                var gst = this.calculateGST(this.products[index], extended);

                var total = Number(Number(extended)+Number(pst)+Number(gst)).toFixed(2);
                var price = {
                    quantity: this.quantity,
                    extended: Number(extended).toFixed(2),
                    discount: Number(0.00).toFixed(2),
                    pst: Number(pst).toFixed(2),
                    gst: Number(gst).toFixed(2),
                    sku_total: Number(total).toFixed(2),
                };

                this.prices.push(price);

                this.sku = '';
                this.quantity = '';
                setTimeout(function(){
                    $("#sku").focus();
                }, 0);
            },

            calculatePST(product, extended) {
                var pst = 0.00;
                if(product.pst == 1) {
                    pst = (extended*0.07).toFixed(2);
                }

                return pst;
            },

            calculateGST(product, extended) {
                var gst = 0.00;
                if(product.gst == 1) {
                    gst = (extended*0.05).toFixed(2);
                }

                return gst;
            },

            updatePrice(index) {
                var extended = (this.prices[index].quantity * this.products[index]['unit_price']).toFixed(2);

                if(this.prices[index].discount != 0) {
                    extended = (extended - (extended * (this.prices[index].discount/100))).toFixed(2);
                }

                var pst = this.calculatePST(this.products[index], extended);
                var gst = this.calculateGST(this.products[index], extended);

                var total = Number(Number(extended)+Number(pst)+Number(gst)).toFixed(2);
                var price = {
                    quantity: this.prices[index].quantity,
                    extended: Number(extended).toFixed(2),
                    discount: Number(this.prices[index].discount).toFixed(2),
                    pst: Number(pst).toFixed(2),
                    gst: Number(gst).toFixed(2),
                    sku_total: Number(total).toFixed(2),
                };  

                
                this.prices.$set(index, price);

                this.sku = '';
                this.quantity = '';
                setTimeout(function(){
                    $("#sku").focus();
                }, 0);
            },

            removeProduct(product, index) {
                this.products.$remove(product);
                this.prices.$remove(this.prices[index]);
            },

            completeSale(method) {
               
                if (!this.products.length || !this.prices.length)
                {
                    alert('Please enter a product');
                    return false;
                }

                var formData = new FormData(document.querySelector('#new-sale-form'));
                this.print = confirm("Print a copy of the invoice?");
                formData.set('printed', this.print);
                formData.set('payment-method', method);
                var url = '//api.batteriespos.dev/v0/sales';
                this.$http.post(url, formData)
                .then(function(response) {
                    //Success
                    this.$dispatch('new-sale');
                    this.close();
                }, function(response) {
                    //TODO: Proper flash message
                });               
            },
        },

        filters: {
            moment: function (date) {
                return Moment(date).format('MMMM Do YYYY');
            }
        }
    });
</script>
