<template>
    <div class="col-md-12 module-container">
        <div class="col-md-12 module-container">
            <div class="module admin-part-orders">
                <h2>Order History</h2>
                <hr />
                
                <table class="table no-print">
                    <tr>
                        <th>Location</th>
                        <th>Part Number</th>
                        <th>Customer</th>
                        <th>Phone Number</th>
                        <th>Product</th>
                        <th>To HO</th>
                        <th>From HO</th>
                        <th>Picked Up</th>
                    </tr>

                    <tr v-for="partOrder in partOrders">
                        <td>{{ partOrder.location.name }}</td>
                        <td><a href="/part-orders/{{ partOrder.id }}">{{ partOrder.id }}</a></td>
                        <td>{{ partOrder.customer.first_name }} {{ partOrder.customer.last_name }}</td>
                        <td>{{ partOrder.customer.primary_phone }}</td>
                        <td>{{ partOrder.item }}</td>
                        <td>{{ partOrder.to_head_office | moment }}</td>
                        <td>{{ partOrder.from_head_office | moment }}</td>
                        <td>{{ partOrder.customer_pick_up | moment }}</td>
                    </tr>
                </table>
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
            partOrders: [],
        }
    },

    ready() {
        this.getPartOrders();
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

        getPartOrders() {
            var url = '/api/v0/part-orders?&with=customer,location&order_by=created_at,desc';

            this.$http.get(url, {api_token: 'token'}).then(function(response) {
            this.$set('partOrders', response.data.data);

            }, function(response) {
            // error callback
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
    }
});

</script>