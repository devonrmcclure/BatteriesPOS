<template>
    <new-customer-modal :show.sync="showNewCustomerModal" :customer.sync="customer" title="New Customer" :location="location" :phone="phoneNumber"></new-customer-modal>
    <form v-on:submit.prevent="getCustomer()">
        <span class="error">{{ error }}</span>
        <input type="text" placeholder="Search Customer" v-model="phoneNumber" value="{{phoneNumber}}" @change="getCustomer()"/><br/>
    </form>
        <div>
            <input type="hidden" name="customer-id" value="{{customer.id}}" readonly/>
            <input type="hidden" name="new-customer" value="{{customer.new_customer}}" readonly/>
            <input type="text" name="customer-first-name" id="first-name" placeholder="First Name" value="{{customer.first_name}}" readonly/>
            <input type="text" name="customer-last-name" id="last-name" placeholder="Last Name" value="{{customer.last_name}}" readonly/>
        </div>
        <div>
            <input type="text" name="customer-address" id="address" placeholder="Address" value="{{customer.address}}" readonly ondblclick="this.readOnly='';" onblur="this.readOnly='true';"/> 
            <input type="text" name="customer-city" id="city" placeholder="City" value="{{customer.city}}" readonly/>
            <input type="text" name="customer-postal-code" id="postal-code" placeholder="Postal Code" value="{{customer.postal_code}}" readonly/>
        </div>
        <div>
            <input type="text" name="customer-primary-phone" id="primary-phone" placeholder="Primary Phone" value="{{customer.primary_phone}}" readonly/>
            <input type="text" name="customer-secondary-phone" id="secondary-phone" placeholder="Secondary Phone" value="{{customer.secondary_phone}}" readonly/>
        </div>
</template>


<script lang="babel">

import Vue from 'vue';
import NewCustomerModal from '../Modals/NewCustomerModal.vue';

export default Vue.extend({
    data() {
        return {
            phoneNumber: '',
            error: '',
            showNewCustomerModal: false,
        }
    },

    components: {NewCustomerModal},

    props: ['customer', 'location'],

    ready() {
        this.getDefaultCustomer();
    },

    methods: {
        getDefaultCustomer() {
            var url = '/api/v0/customers?phone=' + this.location.phone_number + '&location_id=' + this.location.id;

            this.$http.get(url, {api_token: this.location.api_token}).then(function(response) {
                      // get status
                this.$set('error', '');      
                this.$set('customer', response.data.data[0]);
            }, function(response) {
                //TODO: Error
            });
        },

        clearInputs() {
            this.customer = [];
            this.customer = {
                province: 'British Columbia',
                country: 'Canada'
            }
        },

        getCustomer(e) {
            var url = '/api/v0/customers?phone=' + this.phoneNumber + '&location_id=' + this.location.id + '&api_token=' + this.location.api_token;

            this.$http.get(url).then(function(response) {
                      // get status
                this.$set('error', '');
                this.$set('customer', response.data.data[0]);
                this.$set("customer['new_customer']", false);
            }, function(response) {
                //TODO: Error
                this.clearInputs();
                this.showNewCustomerModal = true;
            });
        }
    },

    events: {
        'new-sale': function() {
            this.getDefaultCustomer();
        },

        'new-part-order': function() {
            this.getDefaultCustomer();
        },

        'new-repair-order': function() {
            this.getDefaultCustomer();
        },
    }
});

</script>
