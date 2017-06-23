<template>
    <div class="col-md-12 module-container">
        <div class="col-md-8 module-container">
            <div class="module stock-transfer-order">
                <div class="order-header">
                    <p class="order-status status-{{orderInfo.status}}">Order is {{orderInfo.status}}!</p>
                    <div class="order-number">
                        <h2>Order {{orderInfo.order_number}}</h2>
                    </div>
                    <div class="order-dates">
                        <p><span class="heading">Status:</span> {{orderInfo.status}}</p>
                        <p><span class="heading">Stock Received:</span> {{orderInfo.date_received | moment}}</p>
                    </div>

                </div>
                <div class="clear-class"></div>
                <hr />
                
                <table>
                    <tr>
                        <th>Sku</th>
                        <th>Description</th>
                        <th>Qty Received</th>
                        <th>Previous Vendor Price</th>
                        <th>Current Vendor Price</th>
                    </tr>

                    <tr v-for="product in orderInfo.products">
                        <td>{{product.sku}}</td>
                        <td>{{product.description}}</td>
                        <td>{{product.quantity_ordered}}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="col-md-4 module-container" >
            <div class="module" v-if="orderInfo.status == 'In-Transit' || orderInfo.status == 'Unordered'">
                <span v-if="orderInfo.status == 'Unordered'">
                    <input placeholder="Sku" type="text" class="sku" id="sku" v-model="sku" tab-index="1">
                    <input placeholder="Quantity" type="text" class="qty" id="qty" v-model="qty" @keyup.enter.prevent="addProduct()" @blur="addProduct()" tab-index="2"> <br />
                    <button @click="sendOrder('Completed')">Complete Order</button>
                </span>

                <span>
                    <button @click="sendOrder('Completed')" v-if="orderInfo.status == 'In-Transit'">Mark Order Received</button>
                </span>
            </div>
        </div>
    </div>
</template>

<script>
import Vue from 'vue';
import Moment from 'moment';

export default Vue.extend({

    props: ['location'],

    data() {
        return {
            orderNumber: '',
            orderInfo: [],
            description: '',
            sku: '',
            qty: ''
        }
    },

    ready() {
        var temp = window.location.href.split('/');
        this.orderNumber = temp[6];
        Vue.nextTick(function () {
            this.getStockOrders(this.orderNumber);
            //this.highlightCurrentLocation();
        }.bind(this));
    },

    computed: {
        today: function() {
            var date = new Date();
            var month = date.getMonth() + 1;
            var day = date.getDate();
            var year = date.getFullYear();

            var dateString = year + '-' + (('0' + month).slice(-2)) + '-' + (('0' + day).slice(-2))

            return dateString;
        }
    },

    methods: {
        getStockOrders() {
            var url = '/api/v0/stock-order?order_number=' + this.orderNumber + '&requesting_location=' + this.location.id + '&with=products';
            this.$http.get(url, {api_token: this.location.api_token})
            .then(function(response) {
                //Success
                this.orderInfo = response.data.data[0];
            }, function(response) {
                //Error
                if(response.status === 404)
                {
                    this.orderNumber = [];    
                }
            });
        },

        addProduct() {
            var url = '/api/v0/stock-order/add-product';

            this.$http.post(url, {api_token: this.location.api_token, sku: this.sku, qty: this.qty, order: this.orderNumber}).then(function(response) {
                    this.getStockOrders(this.orderNumber);
                    this.qty = '';
                    this.sku = '';
                    $('.sku').focus();
            }, function(response) {
              this.$set('error', 'The Product does not exist!');
              // error callback
            });

        },

        sendOrder(status) {
            var url = '/api/v0/stock-order/update-status';
            this.$http.post(url, {api_token: this.location.api_token, newStatus: status, orderID: this.orderNumber})
            .then(function(response) {
                //Success
                window.location.href = '/inventory/order';
            }, function(response) {
                //Error
                if(response.status === 404)
                {
                      
                }
            });
        },

        updateQuantity(index) {
            var url = '/api/v0/stock-order/update-product-received-qty';
            this.$http.post(url, {api_token: this.location.api_token, id: this.orderInfo.products[index].id, quantity_received: this.orderInfo.products[index].quantity_filled})
            .then(function(response) {
                //Success
                
            }, function(response) {
                //Error
                if(response.status === 404)
                {
                      
                }
            });
        },        
        
    },

    filters: {
        moment: function (date) {
        if(date !== '' && date !== '0000-00-00 00:00:00' && date !== null)
        {
            return Moment(date).format('YYYY-MM-DD @ H:mm');
        }
            return 'Not Yet';
        }
    },
});

</script>