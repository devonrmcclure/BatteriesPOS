<template>
    <new-customer-modal :show.sync="showNewCustomerModal" :customer.sync="customer" title="New Customer" :location="location" :phone="phoneNumber"></new-customer-modal>
    <form v-on:submit.prevent="getCustomer()">
        <span class="error">{{ error }}</span>
        <input type="text" placeholder="Search Customer" v-model="phoneNumber" value="{{phoneNumber}}" @change="getCustomer()"/><br/>
    </form> 
        <form id="customer-form">
            <div>
                <input type="hidden" name="api_token" v-model="location.api_token" readonly/> 
                <input type="hidden" name="customer-id" v-model="customer.id" readonly/>
                <input type="hidden" name="new-customer" v-model="customer.new_customer" readonly/>
                <input type="text" name="customer-first-name" id="first-name" placeholder="First Name" v-model="customer.first_name" readonly ondblclick="this.readOnly='';" oblur="this.readOnly='true';" @change="updateCustomer()"/>
                <input type="text" name="customer-last-name" id="last-name" placeholder="Last Name" v-model="customer.last_name" readonly ondblclick="this.readOnly='';" oblur="this.readOnly='true';" @change="updateCustomer()"/>
            </div>
            <div>
                <input type="text" name="customer-address" id="address" placeholder="Address" v-model="customer.address" readonly ondblclick="this.readOnly='';" oblur="this.readOnly='true';" @change="updateCustomer()"/> 
                <input type="text" name="customer-city" id="city" placeholder="City" v-model="customer.city" readonly ondblclick="this.readOnly='';" oblur="this.readOnly='true';" @change="updateCustomer()"/>
                <input type="text" name="customer-postal-code" id="postal-code" placeholder="Postal Code" v-model="customer.postal_code" readonly ondblclick="this.readOnly='';" oblur="this.readOnly='true';" @change="updateCustomer()"/>
            </div>
            <div>
                <input type="text" name="customer-primary-phone" id="primary-phone" placeholder="Primary Phone" v-model="customer.primary_phone" readonly ondblclick="this.readOnly='';" oblur="this.readOnly='true';" @change="updateCustomer()"/>
                <input type="text" name="customer-secondary-phone" id="secondary-phone" placeholder="Secondary Phone" v-model="customer.secondary_phone" readonly ondblclick="this.readOnly='';" oblur="this.readOnly='true';" @change="updateCustomer()"/>
            </div>
        </form>
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
        },

        updateCustomer(e) {
            
            var formData = new FormData(document.querySelector('#customer-form'));
            var url = '/api/v0/customers/update';
            this.$http.post(url, formData)
            .then(function(response) {
                //Success
                this.$set('customer', response.data);
                this.close();
            }, function(response) {
                //TODO: Proper flash message
                var array = $.map(response.data, function(value, index) {
                    return [value];
                });

                alert(array.join("\n"));
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
