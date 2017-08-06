<template>
<div class="location-info">
    <h3>Invoice: {{invoice}}</h3><br />
    Location: {{location.name}} <br />
    Sold By: {{rep.first_name}}<br />
    Date: {{ date | moment }} <br />
    <span class="print-method">Method: {{method}} <br/></span>
    <h3>Total: ${{total}}</h3><br />
    
</div>

<form method="POST" id="new-sale-form" action="/api/v0/sales" class="sale-form">
    <input  type="hidden" name="api_token" value="{{location.api_token}}" readonly/> 
    <input type="hidden" name="customer-id" v-model="customer.id" readonly/>
    <input type="hidden" name="sale-total" value="{{total}}" readonly/>
    <input type="hidden" name="sale-rep" value="{{rep.first_name}}" readonly/>
    <input type="hidden" name="sale-invoice" value="{{invoice}}" readonly/>
    <div class="products"> <!-- Tables are dumb and cant have max height -.- -->
        <table>
            <tr>
                <th class="remove-product"></th>
                <th>SKU</th>
                <th class="product-description">Description</th>
                <th>QTY</th>
                <th class="discount">Discount %</th>
                <th>Unit $</th>
                <th>Extended</th>
                <th>PST</th>
                <th>GST</th>
                <th>Total</th>

            </tr>

            <tr v-for="product in products">
                <td class="remove-product" @click="removeProduct(product, $index)" class="removeProduct">&times;</td>
                <td><input type="text" name="sku[]" v-model="product.sku" @change="updateProduct($index)" value="{{product.sku}}"/></td>
                <td><input type="text" name="description[]" value="{{ product.description }}" readonly/></td>
                <td><input type="text" id="qty" name="quantity[]" v-model="prices[$index].quantity" @blur="updatePrice($index)" value="{{prices[$index].quantity}}"/></td>
                <td class="discount"><input type="text" name="discount[]" v-model="prices[$index].discount" @change="updatePrice($index)" value="{{prices[$index].discount}}"/></td>
                <td><input type="text" name="unit-price[]" v-model="product.unit_price" @change="updatePrice($index)" value="{{product.unit_price.toFixed(2)}}"/></td>
                <td><input type="text" name="extended[]" v-model="prices[$index].extended" value="{{prices[$index].extended}}" readonly/></td>
                <td><input type="text" name="pst[]" v-model="prices[$index].pst" value="{{prices[$index].pst}}" readonly/></td>
                <td><input type="text" name="gst[]" v-model="prices[$index].gst" value="{{prices[$index].gst}}" readonly/></td>
                <td><input type="text" name="sku-total[]" v-model="prices[$index].sku_total" value="{{prices[$index].sku_total}}" readonly/></td>
            </tr>

            <tr>
                <td class="active-row" @click="removeProduct(product, $index)" class="removeProduct">&#9658;</td>
                <td><input type="text" class="sku" id="sku" v-model="sku" @change="addProduct()" tab-index="1"></td>
                <td><input type="text" readonly/></td>
                <td><input type="text" readonly/></td>
                <td><input type="text" readonly/></td>
                <td><input type="text" readonly/></td>
                <td><input type="text" readonly/></td>
                <td><input type="text" readonly/></td>
                <td><input type="text" readonly/></td>
                <td><input type="text" readonly></td>
            </tr>       
        </table>
    </div>
    <input type="text" name="invoice-comment" v-model="invoice_comment" list="comments" placeholder="SELECT A COMMENT" size="90"/>
    <datalist id="comments">
        <option>Returns may be subject to a 25% restocking fee.</option>
        <option>Small appliance repairs have a 30 day service warranty.</option>
        <option>Thank you for your business.</option>
        <option>To ensure quality, batteries are a non-exchangeable, non-refundable item.</option>
    </datalist>
    <!-- <select name="invoice-comment" v-model="invoice_comment">
        <option >Returns may be subject to a 25% restocking fee.</option>
        <option>Small appliance repairs have a 30 day service warranty.</option>
        <option>Thank you for your business.</option>
        <option>To ensure quality, batteries are a non-exchangeable, non-refundable item.</option>
    </select> -->
     
</form>

<span class="payment-method">
   <button name="payment-method" value="Cash" @click="completeSale('Cash')">Cash</button>
   <button name="payment-method" value="Interac" @click="completeSale('Interac')">Interac</button>
   <button name="payment-method" value="MasterCard" @click="completeSale('MasterCard')">MasterCard</button>
   <button name="payment-method" value="Visa" @click="completeSale('Visa')">Visa</button>
</span>
    
    <receipt-modal :show.sync="showReceipt" title="Print Receipt?" :print.sync="print" :invoice="invoice"></receipt-modal>

</template>


<script>
    import Vue from 'vue';
    import Moment from 'moment';

    export default Vue.extend({

        props: ['show', 'rep', 'location', 'invoice', 'customer', 'price', 'product'],

        components: {},

        data() {
            return {
                sku: '',
                quantity: '',
                invoice_comment: '',
                paymentMethod: '',
                print: false,
                prices: [],
                products: [],
                date: new Date(),
                method: '',
                showReceipt: false,
                pst: 0,
                gst: 0,
                max_discount: 0
            }
        },

        ready() {
            // TODO: Get value of PST and GST from a "settings" table
            this.getSettingsRates();
            if(this.product || this.price)
            {
                this.products = this.product;
                this.prices = this.price;
            }
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
                this.method = '';
            },

            getSettingsRates() {
                 var url = '/api/v0/settings';

                  this.$http.get(url, {api_token: this.location.api_token}).then(function(response) {
                      this.pst = response.data.data[0].value;
                      this.gst = response.data.data[1].value;
                      this.max_discount = response.data.data[2].value;

                  }, function(response) {
                      this.$set('error', 'The Setting does not exist!');
                // error callback
                  });
            },

            getProduct(sku) {
                  var url = '/api/v0/inventory?sku=' + sku + '&with=associated_sku.associated_sku';

                  this.$http.get(url, {api_token: this.location.api_token}).then(function(response) {
                      this.products.push(response.data.data[0]);

                      this.calculatePrice();

                  }, function(response) {
                      this.$set('error', 'The Product does not exist!');
                // error callback
                  });
            },

            addProduct() {
                if(this.prices.length < this.products.length)
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
                    $('input[id=qty]:last').focus();
                }, 0);
            },

            calculatePST(product, extended) {
                var calcPST = 0;
                if(product.pst == 1) {
                    calcPST = (extended*this.pst);
                }

                return Math.round((calcPST * 100).toFixed(2)) / 100;
            },

            calculateGST(product, extended) {
                var calcGST = 0;
                if(product.gst == 1) {
                    calcGST = (extended*this.gst);
                    console.log(Math.round((calcGST * 100).toFixed(2)) / 100);
                }

                return Math.round((calcGST * 100).toFixed(2)) / 100;
            },

            updateProduct(index) {
                var url = '/api/v0/inventory?sku=' + this.products[index]['sku'];

                  this.$http.get(url, {api_token: this.location.api_token}).then(function(response) {
                      this.products.$set(index, response.data.data[0]);
                      this.updatePrice(index);

                  }, function(response) {
                      this.$set('error', 'The Rep does not exist!');
                // error callback
                  });
            },

            updatePrice(index) {
                var extended = (this.prices[index].quantity * this.products[index]['unit_price']).toFixed(2);

                if(this.prices[index].quantity == 0 || this.prices[index].quantity == "") {
                    alert('Please enter a quantity');
                    
                    this.prices[index].quantity = '';
                    
                    setTimeout(function(){
                        $('input[id=qty]:last').focus();
                    }, 0);

                    return false;
                }
                
                
                if(this.products[index]['associated_sku'] !== undefined && this.products[index]['associated_sku'].length > 0)
                {
                    //console.log(this.products[index]['associated_sku'][0]['multiplyer']);
                    this.products.push(this.products[index]['associated_sku'][0]['associated_sku']);

                    this.calculatePrice();

                    this.prices[(Number(index) + 1)].quantity = Number(this.products[index]['associated_sku'][0]['multiplyer']) * Number(this.prices[index].quantity);

                }    
                

                if(this.prices[index].discount != 0 && (this.prices[index].discount/100) <= this.max_discount) {
                    //TODO: check if the product is exempt from max discount %
                    extended = (extended - (extended * (this.prices[index].discount/100))).toFixed(2);
                } else {
                    this.prices[index].discount = 0;
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
                this.method = method;
                if (!this.products.length || !this.prices.length)
                {
                    alert('Please enter a product');
                    return false;
                }

                Vue.nextTick(function () {
                    var formData = new FormData(document.querySelector('#new-sale-form'));
                    this.print = false; //confirm("Print a copy of the invoice?");
                    if(this.print) {
                        window.print();
                    }
                    formData.set('printed', this.print);
                    formData.set('payment-method', method);
                    var url = '/api/v0/sales';
                    this.$http.post(url, formData)
                    .then(function(response) {
                        //Success
                        this.$dispatch('new-sale');
                        this.close();
                    }, function(response) {
                        //TODO: Proper flash message
                    });               
                }.bind(this));
               
            },
        },

        filters: {
            moment: function (date) {
                return Moment(date).format('MMMM Do YYYY');
            }
        }
    });
</script>
