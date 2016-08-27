<template>
    <button value="New Customer" @click="newCustomer()">New Customer</button>
	<table class="table">
        <tr>
            <th>Customer</th>
            <th>Primary Phone</th>
            <th>Secondary Phone</th>
            <th>Customer Since</th>
        </tr>

        <tr v-for="customer in customers">
            <td>{{ customer.first_name }} {{ customer.last_name }}</td>
            <td>{{ customer.primary_phone }}</td>
            <td>{{ customer.secondary_phone }}</td>
            <td>{{ customer.created_at | moment }}</td>
        </tr>
    </table>

    <new-customer-modal :show.sync="showNewCustomerModal" title="New Customer" :location="location"></new-customer-modal>
</template>

<script lang="babel">
import Vue from 'vue';
import Moment from 'moment';
import NewCustomerModal from '../Modals/NewCustomerModal.vue';

export default Vue.extend({

    components: {NewCustomerModal},
    props: ['location'],
	data() {
		return {
            customers: [],
            showNewCustomerModal: false,
		}
	},

    ready() {
        this.getCustomers();
    },

	methods: {
        getCustomerList() {
            this.getCustomers();
        },

        getCustomers() {
            var url = '/api/v0/customers?location_id=' + this.location.id;

            this.$http.get(url, {api_token: this.location.api_token}).then(function(response) {
                      // get status
                this.$set('customers', response.data.data);
            }, function(response) {
                //TODO: Error
                console.log('There are no customers');
            });
        },

        newCustomer() {
            this.showNewCustomerModal = true;
        }
	},

    filters: {
        moment: function (date) {
            return Moment(date).format('MMMM Do YYYY');
        }
    },

    events: {
        'new-customer': function() {
            this.getCustomers();
        }
    }


});

</script>
