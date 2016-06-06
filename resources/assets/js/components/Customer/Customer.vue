<template>
    <span>{{ error }}</span>
    <div><input type="text" name="first-name" id="first-name" placeholder="First Name" v-model="customer.first_name"/><input type="text" name="last-name" id="last-name" placeholder="Last Name" v-model="customer.last_name"/></div>
    <div>{{customer.address}} {{customer.city}} {{customer.postal_code}}</div>
    <div>{{customer.primary_phone}}</div>
    <div>{{customer.secondary_phone}}</div>
    <input type="text" placeholder="Search Customer" v-model="phone_number" @change="getCustomer()"/>

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
                this.$set('customer', response.data.data[0]);
            }, function(response) {
                //TODO: Error
            });
        },

        getCustomer() {
            var url = '//api.batteriespos.dev/v0/customers?phone=' + this.phone_number + '&location_id=' + this.location.id + '&api_token=' + this.location.api_token;

            this.$http.get(url).then(function(response) {
                      // get status
                this.$set('customer', response.data.data[0]);
            }, function(response) {
                //TODO: Error
                this.$set('error', 'Customer does not exist please add below');
            });

            this.phone_number = '';
        }
    },
});

</script>
