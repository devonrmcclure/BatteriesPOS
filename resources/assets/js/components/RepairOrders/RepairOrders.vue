<template>
    <button @click="newOrder">New Repair Order</button>
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

    <repair-orders-modal :show.sync="newRepairOrder" :location.sync="location" :order-number="orderNumber" title="New Repair Order"></repair-orders-modal>
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
                orderNumber: ''
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
                this.getRepairOrderNumber();
                this.newRepairOrder = true;
            },

            getRepairOrderNumber() {
                var url = '/api/v0/repair-orders?order_by=created_at,desc&location_id=' + this.location.id;

                this.$http.get(url, {api_token: this.location.api_token})
                .then( function(response) {
                    //Success
                    this.$set('orderNumber', Number(response.data.data[0].id+1));
                }, function(response) {
                    //Error

                    switch(this.location.name) {
                        case "Head Office":
                            this.orderNumber = 0;
                            break;
                        case "Richmond":
                            this.orderNumber = 20000;
                            break;
                        case "White Rock":
                            this.orderNumber = 30000;
                            break;
                        case "Guildford":
                            this.orderNumber = 60000;
                            break;
                        case "Nanaimo":
                            this.orderNumber = 70000;
                            break;
                        case "Maple Ridge":
                            this.orderNumber = 80000;
                            break;
                        default:
                            //Throw error
                            console.log('ERROR');
                    }
                });
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
