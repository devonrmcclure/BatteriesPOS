<template>
	<table>
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
</template>

<script lang="babel">
import Vue from 'vue';
import Moment from 'moment';

export default Vue.extend({

	data() {
		return {
            customers: [],
		}
	},

    ready() {
        this.getCustomers();
    },

	methods: {
        getCustomers() {
            var url = '//api.batteriespos.dev/v0/customers?location_id=3&api_token=token';

            this.$http.get(url).then(function(response) {
                      // get status
                this.$set('customers', response.data.data);
            }, function(response) {
                //TODO: Error
                alert('There are no customers');
            });

            this.phone_number = '';
        }
	},

    filters: {
        moment: function (date) {
            return Moment(date).format('MMMM Do YYYY, H:mm');
        }
    }


});

</script>
