<template>
    <table class="table">
        <tr>
            <th>Repair Number</th>
            <th>Customer</th>
            <th>Phone Number</th>
            <th>Product</th>
            <th>Date Created</th>
        </tr>

        <tr v-for="repairOrder in repairOrders">
            <td>{{ repairOrder.repair_order_number }}</td>
            <td>{{ repairOrder.customer.first_name }} {{ repairOrder.customer.last_name }}</td>
            <td>{{ repairOrder.customer.primary_phone }}</td>
            <td>{{ repairOrder.product }}</td>
            <td>{{ repairOrder.created_at }}</td>
        </tr>
    </table>
</template>

<script lang="babel">
    import Vue from 'vue';

    export default Vue.extend({
        data() {
            return {
                repairOrders: []
            }
        },

        ready() {
            this.getRepairOrders();
        },

        methods: {
            getRepairOrders() {
                var url = 'http://api.batteriespos.dev/v0/repair-orders?&with=customer&location_id=3';
              
                this.$http.get(url, {api_token: 'token'}).then(function(response) {
                this.$set('repairOrders', response.data.data);

                }, function(response) {
                // error callback
                });
            }
        }
    });

</script>