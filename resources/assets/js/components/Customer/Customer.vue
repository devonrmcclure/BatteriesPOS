<template>
    <span class="error">{{ error }}</span>
    <div>
        <input type="hidden" name="customer-id" v-model="customer.id"/>
        <input type="hidden" name="new-customer" v-model="customer.new_customer"/>
        <input type="text" name="customer-first-name" id="first-name" placeholder="First Name" v-model="customer.first_name"/>
        <input type="text" name="customer-last-name" id="last-name" placeholder="Last Name" v-model="customer.last_name"/>
    </div>
    <div>
        <input type="text" name="customer-address" id="address" placeholder="Address" v-model="customer.address"/> 
        <input type="text" name="customer-city" id="city" placeholder="City" v-model="customer.city"/>
        <input type="text" name="customer-postal-code" id="postal-code" placeholder="Postal Code" v-model="customer.postal_code"/>
    </div>
    <div>
        <input type="text" name="customer-primary-phone" id="primary-phone" placeholder="Primary Phone" v-model="customer.primary_phone"/>
        <input type="text" name="customer-secondary-phone" id="secondary-phone" placeholder="Secondary Phone" v-model="customer.secondary_phone"/>
    </div>
    <input type="text" placeholder="Search Customer" v-model="phone_number" @change="getCustomer()"/><br/>
</template>


<script lang="babel">

import Vue from 'vue';

export default Vue.extend({
    data() {
        return {
            phone_number: '',
            error: ''
        }
    },

    props: ['customer', 'location'],

    ready() {
        this.getDefaultCustomer();
    },

    methods: {
        getDefaultCustomer() {
            var url = '//api.batteriespos.dev/v0/customers?phone=' + this.location.phone_number + '&location_id=' + this.location.id + '&api_token=' + this.location.api_token;

            this.$http.get(url).then(function(response) {
                      // get status
                this.$set('error', '');      
                this.$set('customer', response.data.data[0]);
                this.$set("customer['new_customer']", false);
            }, function(response) {
                //TODO: Error
            });
        },

        getCustomer() {
            var url = '//api.batteriespos.dev/v0/customers?phone=' + this.phone_number + '&location_id=' + this.location.id + '&api_token=' + this.location.api_token;

            this.$http.get(url).then(function(response) {
                      // get status
                this.$set('error', '');
                this.$set('customer', response.data.data[0]);
                this.$set("customer['new_customer']", false);
            }, function(response) {
                //TODO: Error
                this.$set('error', 'Customer does not exist please add below');
                this.$set("customer['new_customer']", true);
            });

            this.phone_number = '';
        }
    },

    events: {
        'new-sale': function() {
            this.getDefaultCustomer();
        }
    }
});

</script>
