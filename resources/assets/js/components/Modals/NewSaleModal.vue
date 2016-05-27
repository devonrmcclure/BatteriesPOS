<template>
    <modal :show.sync="show" :on-close="close" :title.sync="title">

        <div class="Modal__body">
            <customer :customer.sync="customer" :location.sync="location"></customer>
            Location: {{ location.name }} <br />
            Sold By: {{ rep.first_name }} <br />
            Date: {{ date | moment }} <br />
            Total: {{total}}<br />
            Invoice: {{invoice}}<br />
            <input class="sku" id="sku" v-model="sku" @change="addProduct" placeholder="Sku" tab-index="1">  <input v-model="quantity" @change="calculatePrice()" placeholder="Quantity">
            <table class="products">
                <tr>
                    <th></th>
                    <th>SKU</th>
                    <th>Description</th>
                    <th>QTY</th>
                    <th>Discount</th>
                    <th>Unit $</th>
                    <th>Extended</th>
                    <th>PST</th>
                    <th>GST</th>
                    <th>Total</th>

                </tr>

                <tr v-for="product in products">
                    <td @click="removeProduct(product, $index)">X</td>
                    <td>{{ product.sku }}</td>
                    <td>{{ product.description }}</td>
                    <td>{{ prices[$index].quantity }}</td>
                    <td>{{ prices[$index].discount }}</td>
                    <td>{{ product.unit_price }}</td>
                    <td>{{ prices[$index].extended }}</td>
                    <td>{{ prices[$index].pst }}</td>
                    <td>{{ prices[$index].gst }}</td>
                    <td>{{ prices[$index].sku_total }}</td>
                </tr>

            </table>
            <select v-model="invoice_comment">
                <option selected>Returns may be subject to a 25% restocking fee.</option>
                <option>Small appliance repairs have a 30 day service warranty.</option>
                <option>Thank you for your business.</option>
                <option>To ensure quality, batteries are a non-refundable item.</option>
            </select>
        </div>

        <div class="Modal__footer">
            <span class="payment-method">
                <p class="paymentMethod"><span @click="completeSale('Cash')">CASH</span> | <span @click="completeSale('Interac')">Interac</span> | <span @click="completeSale('Mastercard')">MASTERCARD</span> | <span @click="completeSale('Visa')">VISA</span></p>
            </span>
        </div>
    </modal>

    <receipt-modal :show.sync="showReceipt" title="Print Receipt?" :print.sync="print"></receipt-modal>
</template>


<script>
    import Moment from 'moment';
    import Modal from './Modal.vue';
    import ReceiptModal from './ReceiptModal.vue';
    import Customer from '../Customer/Customer.vue';

    export default Modal.extend({

        props: ['show', 'title', 'rep', 'location', 'invoice', 'showReceipt'],

        components: {Modal, Customer, ReceiptModal},

        data() {
            return {
                products: [],
                prices: [],
                customer: [],
                sku: '',
                quantity: '',
                invoice_comment: '',
                paymentMethod: '',
                postData: {},
                print: false,
                date: new Date(),
            }
        },

        ready() {
            //this.getCustomer();
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

            },

            clearData() {
                this.products = [];
                this.prices = [];
                this.sku = '';
                this.quantity = '';
                this.invoice = '';
                this.method = '';
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

            calculatePrice(product = null) {
                if(!this.products.length > this.prices.length) {
                    this.sku = '';
                    this.quantity = '';
                }
                var index = this.products.length - 1;
                var extended = (this.quantity * this.products[index]['unit_price']).toFixed(2);
                var pst = 0, gst = 0;
                //Check if it's taxable.
                if(this.products[index]['pst'] == 1)
                {
                    pst = (extended*0.07).toFixed(2);
                }
                if(this.products[index]['gst'] == 1)
                {
                    gst = (extended*0.05).toFixed(2);
                }


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

            removeProduct(product, index) {
                this.products.$remove(product);
                this.prices.$remove(this.prices[index]);
            },

            completeSale(method) {
                if (!this.products || !this.prices)
                {
                    alert('Please enter a product');
                    return false;
                }

                this.print = confirm("Print a copy of the invoice?");

                this.paymentMethod = method;
                var url = '//api.batteriespos.dev/v0/sales';

                this.$http.post(url, {
                    products: this.products,
                    prices: this.prices,
                    invoice: this.invoice,
                    location: this.location,
                    total: this.total,
                    customer: this.customer,
                    invoice_comment: this.invoice_comment,
                    rep: this.rep,
                    printed: this.print,
                    paymentMethod: this.paymentMethod,
                    api_token: this.location.api_token
                })
                .then(function(response) {
                    //Success
                    this.$dispatch('new-sale');
                    if(this.print) {
                        console.log('Print the invoice!!');
                    }
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
