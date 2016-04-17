<!--TODO: Focus sku 
            - Increment Invoice # -->


<template>
    <input class="sku" id="sku" v-model="sku" @change="addProduct" placeholder="Sku">  <input v-model="quantity" @change="calculatePrice()" placeholder="Quantity"><button @click="completeSale()">BUTTON</button>
    <span class="pull-right">${{total}}</span>
    <table class="table">
        <tr>
            <th>SKU</th>
            <th>Description</th>
            <th>QTY</th>
            <th>Discount</th>
            <th>Unit $</th>
            <th>Extended</th>
            <th>PST</th>
            <th>GST</th>
            <th>Total</th>
            <th></th>
        </tr>
            <tr class="sale-row" v-for="product in products">
                <td>{{ product.sku }}</td>
                <td>{{ product.description }}</td>
                <td>{{ prices[$index].quantity }}</td>
                <td>{{ prices[$index].discount }}</td>
                <td>{{ product.unit_price }}</td>
                <td>{{ prices[$index].extended }}</td>
                <td>{{ prices[$index].pst }}</td>
                <td>{{ prices[$index].gst }}</td>
                <td>{{ prices[$index].sku_total }}</td>
                <td @click="removeProduct(product, $index)">X</td>
            </tr>

    </table>
    
</template>

<script lang="babel">

    export default {
        data () {
            return {
                products: [],
                invoice: '',
                sku: '',
                quantity: '',
                prices: [],
            }
        },

        ready() {
            this.getInvoice();
            setTimeout(function(){
                    $("#sku").focus();
            }, 0);
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
            getProduct(sku){
                this.$http.get('http://api.batteriespos.dev/v0/inventory?sku=' + sku + '&api_token=token', function(response) {
                    this.products.push(response[0].data[0][0]);
                    console.log(response[0].data[0][0]);
                }).error((err) => console.log(err));
            },

            removeProduct(product, index) {
                this.products.$remove(product);
                this.prices.$remove(this.prices[index]);
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

            calculatePrice(product = null) {
                if(!this.products.length > this.prices.length) {
                    this.sku = '';
                    this.quantity = ''; 
                }
                var index = this.products.length - 1;
                    var extended = (this.quantity * this.products[index]['unit_price']).toFixed(2);
                    var pst = (extended*0.07).toFixed(2);
                    var gst = (extended*0.05).toFixed(2);
                    var total = Number(Number(extended)+Number(pst)+Number(gst)).toFixed(2);
                    var price = {
                        quantity: this.quantity,
                        extended: Number(extended).toFixed(2),
                        discount: 0.00,
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

            completeSale() {
                var that = this;
                this.$http.post('http://api.batteriespos.dev/v0/sales?api_token=token', {products: that.products, prices: that.prices, invoice: that.invoice, sale_total: that.total}, function(response){
                    console.log(response);
                });
                this.clearVariables();
                this.getInvoice();
            },

            clearVariables() {
                this.products = [];
                this.prices = [];
                this.sku = '';
                this.quantity = '';
                console.log('test');
                setTimeout(function(){
                    $("#sku").focus();
                }, 0);
            },

            getInvoice() {
                this.$http.get('http://api.batteriespos.dev/v0/invoice?location=White%20Rock&only=id&limit=1&api_token=token', function(response) {
                    this.invoice = response[0].data[0][0].id+1
                }).error((err) => console.log(err));
            }
        },
    }
</script>