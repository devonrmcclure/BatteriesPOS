<template>
    <div class="col-md-12 module-container">
        <div class="col-md-8 module-container">
            <div class="module stock-transfer-order">
                <div class="order-header">
                    <p class="order-status status-{{orderInfo.status}}">Request is {{orderInfo.status}}!</p>
                    <div class="order-number">
                        <h2>Request {{orderInfo.order_number}}</h2>
                    </div>
                    <div class="order-dates">
                        <p><span class="heading">Status:</span> {{orderInfo.status}}</p>
                        <p><span class="heading">Stock Ordered:</span> {{orderInfo.date_ordered | moment}}</p>
                        <p><span class="heading">Stock In-Transit:</span> {{orderInfo.date_in_transit | moment}}</p>
                        <p><span class="heading">Stock Received:</span> {{orderInfo.date_received | moment}}</p>
                    </div>

                </div>
                <div class="clear-class"></div>
                <hr />
                
                <table>
                    <tr>
                        <th>Sku</th>
                        <th>Description</th>
                        <th>Qty Ordered</th>
                    </tr>

                    <tr v-for="product in orderInfo.products">
                        <td>{{product.sku}}</td>
                        <td>{{product.description}}</td>
                        <td v-if="orderInfo.status == 'Ordered'"><input type="text" @blur="updateQuantity($index)" v-model="product.quantity_ordered"></input></td>

                        <td v-else>{{product.quantity_ordered}}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="col-md-4 module-container" v-if="orderInfo.status == 'Ordered'">
            <div class="module">
                <button @click="sendOrder()">Mark In Transit</button>
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
        this.orderNumber = temp[5];
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
            //TODO add &status=ordered when done debugging
            var url = '/api/v0/stock-order?order_number=' + this.orderNumber + '&requesting_from_location=' + this.location.id + '&with=products';
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

        updateQuantity(index) {
            var url = '/api/v0/stock-order/update-product-order-qty';
            this.$http.post(url, {api_token: this.location.api_token, id: this.orderInfo.products[index].id, quantity_ordered: this.orderInfo.products[index].quantity_ordered})
            .then(function(response) {
                //Success
                
            }, function(response) {
                //Error
                if(response.status === 404)
                {
                      
                }
            });
        },   

        sendOrder() {
            var url = '/api/v0/stock-order/update-status';
            this.$http.post(url, {api_token: this.location.api_token, newStatus: 'In-Transit', orderID: this.orderNumber})
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