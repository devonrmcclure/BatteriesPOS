<template>
    <button @click="newOrder">+</button>
    <table class="table">
        <tr>
            <th>Part Order Number</th>
            <th>Customer</th>
            <th>Phone Number</th>
            <th>Product</th>
            <th>To HO</th>
            <th>From HO</th>
            <th>Picked Up</th>
            <th>Called</th>
        </tr>

        <tr v-for="partOrder in partOrders">
            <td><a href="part-orders/{{ partOrder.id }}">{{ partOrder.id }}</a></td>
            <td>{{ partOrder.customer.first_name }} {{ partOrder.customer.last_name }}</td>
            <td>{{ partOrder.customer.primary_phone }}</td>
            <td>{{ partOrder.item }}</td>
            <td>{{ partOrder.to_head_office | moment }}</td>
            <td>{{ partOrder.from_head_office | moment }}</td>
            <td>{{ partOrder.customer_pick_up | moment }}</td>
            <td>{{ partOrder.customer_called | moment }}</td>
        </tr>
    </table>

    <part-orders-modal :show.sync="newPartOrder" :location.sync="location" title="New Part Order"></part-orders-modal>
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
            }
        },

        ready() {
            this.getPartOrders();
        },

        methods: {
            getPartOrders() {
                var url = 'http://api.batteriespos.dev/v0/part-orders?&with=customer&location_id=3';

                this.$http.get(url, {api_token: 'token'}).then(function(response) {
                this.$set('partOrders', response.data.data);

                }, function(response) {
                // error callback
                });
            },

            newOrder() {
                this.newPartOrder = true;
            },
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
            'new-part-order': function() {
                this.getPartOrders();
            }
        }
    });

</script>
