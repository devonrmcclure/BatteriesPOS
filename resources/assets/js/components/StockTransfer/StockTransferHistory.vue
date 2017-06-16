<template>
    <div class="col-md-12 module-container">
        <div class="col-md-8 module-container">
            <div class="module stock-transfer-history">
                <h2>Order History</h2>
                <hr />
                
                <div class="stock-tabs">
                    <button class="orderTab tab tab-active" @click="showTab('orders')">Orders</button><button class="requestTab tab" @click="showTab('requests')">Requests</button>
                </div>


                <div class="stock-order-history">
                    <div class="order" v-for='order in orders'>

                        <!-- completed order -->
                        <div v-if="order.status == 'Completed'" class="status-{{order.status}}">
                            <p class="order-number">Order {{order.order_number}}</p>
                            <p class="order-date">{{order.created_at | moment}}</p>
                            <p class="view-more"><a href="/inventory/order/{{order.order_number}}"><i class="material-icons md-24 md-black"> launch</i></a></p>
                            <p class="order-status"><i class="material-icons md-24 green700">done </i></p>
                        </div>
                        
                        <!-- incomplete order -->
                        <div v-else class="status-{{order.status}}">
                            <p class="order-number">Order {{order.order_number}}</p>
                            <p class="order-date">{{order.created_at | moment}}</p>
                            <p class="view-more"><a href="/inventory/order/{{order.order_number}}"><i class="material-icons md-24 md-black"> launch</i></a></p>
                            <p class="order-status"><i class="material-icons md-24 md-icon-{{order.status}}">info_outline </i></p>
                        </div>
                    </div>
                </div>

                <div class="stock-request-history hidden">
                    <div class="order" v-for='request in requests'>

                        <!-- completed order -->
                        <div v-if="request.status == 'Completed'" class="status-{{request.status}}">
                            <p class="order-number">Order {{request.order_number}}</p>
                            <p class="order-date">{{request.created_at | moment}}</p>
                            <p class="view-more"><a href="/inventory/request/{{request.order_number}}"><i class="material-icons md-24 md-black"> launch</i></a></p>

                            <p class="order-status"><i class="material-icons md-24 green700">done </i></p>
                        </div>
                        
                        <!-- incomplete order -->
                        <div v-else class="status-{{request.status}}">
                            <p class="order-number">Order {{request.order_number}}</p>
                            <p class="order-date">{{request.created_at | moment}}</p>
                            <p class="view-more"><a href="/inventory/request/{{request.order_number}}"><i class="material-icons md-24 md-black"> launch</i></a></p>
                            <p class="order-status"><i class="material-icons md-24 md-icon-{{request.status}}">info_outline </i></p>
                        </div>
                    </div>               
                </div>
            </div>
        </div>

        <div class="col-md-4 module-container">
            <div class="module">
                <span>Order From:</span> 
                <select id="order-from">
                    <option v-for="location in locations" value="{{location.location_code}}">{{location.name}}</option>
                </select>
                <p class="new-order"><button @click="newOrder()">new order</button></p>
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
            orders: [],
            requests: [],
            locations: []
        }
    },

    ready() {
        this.getStockOrders();
        this.getStockRequests();
        this.getLocations();

    },

    computed: {
        today: function() {
            var date = new Date();
            var month = date.getMonth() + 1;
            var day = date.getDate();
            var year = date.getFullYear();

            var dateString = year + '-' + (('0' + month).slice(-2)) + '-' + (('0' + day).slice(-2))

            return dateString;
        },
    },

    methods: {

        getLocations() {
            var url = '/api/v0/user?only=id,location_code,name&order_by=name,asc';
            this.$http.get(url, {api_token: this.location.api_token})
            .then(function(response) {
                //Success
                this.locations = response.data.data;
            }, function(response) {
                //Error
                if(response.status === 404)
                {
                    this.locations = [];   
                }
            });

        },

        getStockOrders() {
            var url = '/api/v0/stock-order?order_by=created_at,desc&requesting_location=' + this.location.id + '&limit=5';
            this.$http.get(url, {api_token: this.location.api_token})
            .then(function(response) {
                //Success
                this.orders = response.data.data;
            }, function(response) {
                //Error
                if(response.status === 404)
                {
                    this.order = [];   
                }
            });
        },

        getStockRequests() {
            var url = '/api/v0/stock-order?order_by=created_at,desc&requesting_from_location=' + this.location.id + '&except=status,!=,Unordered&limit=5';
            this.$http.get(url, {api_token: this.location.api_token})
            .then(function(response) {
                //Success
                this.requests = response.data.data;
            }, function(response) {
                //Error
                if(response.status === 404)
                {
                    this.requests = [];   
                }
            });
        },

        showTab(type) {
            if(type == 'orders')
            {
                $('.stock-order-history').show();
                $('.orderTab').addClass('tab-active');
                $('.stock-request-history').hide();
                $('.requestTab').removeClass('tab-active');
            } else {
                $('.stock-order-history').hide();
                $('.orderTab').removeClass('tab-active');
                $('.stock-request-history').show();
                $('.stock-request-history').removeClass('hidden');
                $('.requestTab').addClass('tab-active');
            }
        },

        newOrder() {

            var url = '/api/v0/stock-order';
            this.$http.post(url, {api_token: this.location.api_token, order_from: $("#order-from").val(), ordering_location: this.location.location_code})
            .then(function(response) {
                //Success
                window.location.href = '/inventory/order/' + response.data;
            }, function(response) {
                //Error
                if(response.status === 404)
                {
                    this.requests = [];   
                }
            });
        }
    },

    filters: {
        moment: function (date) {
            return Moment(date).format('YYYY-MM-DD');
        }
    }
});

</script>