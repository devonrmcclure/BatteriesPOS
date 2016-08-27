<template>
    <button @click="newOrder">+</button>
    <table class="table">
        <tr>
            <th>Repair Number</th>
            <th>Customer</th>
            <th>Phone Number</th>
            <th>Product</th>
            <th>To HO</th>
            <th>From HO</th>
            <th>Picked Up</th>
        </tr>

        <tr v-for="repairOrder in repairOrders">
            <td>{{ repairOrder.id }}</td>
            <td>{{ repairOrder.customer.first_name }} {{ repairOrder.customer.last_name }}</td>
            <td>{{ repairOrder.customer.primary_phone }}</td>
            <td>{{ repairOrder.product }}</td>
            <td>{{ repairOrder.to_head_office | moment }}</td>
            <td>{{ repairOrder.from_head_office | moment }}</td>
            <td>{{ repairOrder.customer_pick_up | moment }}</td>
        </tr>
    </table>

    <repair-orders-modal :show.sync="newRepairOrder" :location.sync="location" title="New Repair Order"></repair-orders-modal>
</template>

<script lang="babel">
    import Vue from 'vue';
    import Moment from 'moment';
    import RepairOrdersModal from '../Modals/RepairOrdersModal.vue';

    export default Vue.extend({

        props: ['location'],

        components: {RepairOrdersModal},
        data() {
            return {
                repairOrders: [],
                newRepairOrder: false,
            }
        },

        ready() {
            this.getRepairOrders();
        },

        methods: {
            getRepairOrders() {
                var url = '/api/v0/repair-orders?&with=customer&location_id=3';

                this.$http.get(url, {api_token: 'token'}).then(function(response) {
                this.$set('repairOrders', response.data.data);

                }, function(response) {
                // error callback
                });
            },

            newOrder() {
                this.newRepairOrder = true;
            }
        },

        filters: {
            moment: function (date) {
            if(date !== '' && date !== '0000-00-00 00:00:00')
            {
                return Moment(date).format('MMMM Do YYYY, H:mm');
            }
                return 'Not Yet';
            }
        },

        events: {
            'new-repair-order': function() {
                this.getRepairOrders();
            }
        }
    });

</script>
