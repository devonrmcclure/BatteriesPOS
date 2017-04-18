<template>
    <button @click="newOrder">New Part Order</button>
    <table class="table no-print">
        <tr>
            <th>Order Number</th>
            <th>Customer</th>
            <th>Phone Number</th>
            <th>Product</th>
            <th>To HO</th>
            <th>From HO</th>
            <th>Called</th>
            <th>Picked Up</th>
        </tr>

        <tr v-for="partOrder in partOrders">
            <td><a href="part-orders/{{ partOrder.id }}">{{ partOrder.id }}</a></td>
            <td>{{ partOrder.customer.first_name }} {{ partOrder.customer.last_name }}</td>
            <td>{{ partOrder.customer.primary_phone }}</td>
            <td>{{ partOrder.item }}</td>
            <td>{{ partOrder.to_head_office | moment }}</td>
            <td>{{ partOrder.from_head_office | moment }}</td>
            <td>{{ partOrder.customer_called | moment }}</td>
            <td>{{ partOrder.customer_pick_up | moment }}</td>
        </tr>
    </table>

    <part-orders-modal :show.sync="newPartOrder" :location.sync="location" :id="partOrderID" title="New Part Order"></part-orders-modal>
</template>

<script lang="babel">
    import Vue from 'vue';
    import Moment from 'moment';
    import partOrdersModal from '../Modals/PartOrdersModal.vue';

    export default Vue.extend({

        components: {partOrdersModal},

        props: ['location'],

        data() {
            return {
                partOrders: [],
                newPartOrder: false,
                partOrderID: ''
            }
        },

        ready() {
            this.getPartOrders();
            this.getPartOrderID();
        },

        methods: {
            getPartOrders() {
                var url = '/api/v0/part-orders?&with=customer&order_by=created_at,desc&location_id=' + this.location.id;

                this.$http.get(url, {api_token: 'token'}).then(function(response) {
                this.$set('partOrders', response.data.data);

                }, function(response) {
                // error callback
                });
            },

            newOrder() {
                this.getPartOrderID();
                this.newPartOrder = true;
            },

            getPartOrderID() {
                var url = '/api/v0/part-orders?order_by=created_at,desc&location_id=' + this.location.id;

                this.$http.get(url, {api_token: this.location.api_token})
                .then( function(response) {
                    //Success
                    this.$set('partOrderID', Number(response.data.data[0].id+1));
                }, function(response) {
                    //Error
                    switch(this.location.name) {
                        case "Head Office":
                            this.partOrderID = 0;
                            break;
                        case "Richmond":
                            this.partOrderID = 20000;
                            break;
                        case "White Rock":
                            this.partOrderID = 30000;
                            break;
                        case "Guildford":
                            this.partOrderID = 60000;
                            break;
                        case "Nanaimo":
                            this.partOrderID = 70000;
                            break;
                        case "Maple Ridge":
                            this.partOrderID = 80000;
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
                return Moment(date).format('YYYY-MM-D @ H:mm');
            }
                return 'Not Yet';
            }
        },

        events: {
            'new-part-order': function() {
                this.getPartOrders();
                this.getPartOrderID();
            }
        }
    });

</script>
