<template>
    <div class="col-md-12 module-container">
        <div class="col-md-12 module-container">
            <div class="module admin-repair-orders">
                <h2>Order History</h2>
                <hr />
                
                <table class="table no-print">
                    <tr>
                        <th>Location</th>
                        <th>Repair Number</th>
                        <th>Customer</th>
                        <th>Phone Number</th>
                        <th>Product</th>
                        <th>To HO</th>
                        <th>From HO</th>
                        <th>Picked Up</th>
                    </tr>

                    <tr v-for="repairOrder in repairOrders">
                        <td>{{ repairOrder.location.name }}</td>
                        <td><a href="repair-orders/{{ repairOrder.id }}">{{ repairOrder.id }}</a></td>
                        <td>{{ repairOrder.customer.first_name }} {{ repairOrder.customer.last_name }}</td>
                        <td>{{ repairOrder.customer.primary_phone }}</td>
                        <td>{{ repairOrder.product }}</td>
                        <td>{{ repairOrder.to_head_office | moment }}</td>
                        <td>{{ repairOrder.from_head_office | moment }}</td>
                        <td>{{ repairOrder.customer_pick_up | moment }}</td>
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
            repairOrders: [],
        }
    },

    ready() {
        this.getRepairOrders();
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

        getRepairOrders() {
            var url = '/api/v0/repair-orders?&with=customer,location&order_by=created_at,desc';

            this.$http.get(url, {api_token: 'token'}).then(function(response) {
            this.$set('repairOrders', response.data.data);

            }, function(response) {
            // error callback
            });
        },
    },

    filters: {
        moment: function (date) {
            return Moment(date).format('YYYY-MM-DD');
        }
    }
});

</script>