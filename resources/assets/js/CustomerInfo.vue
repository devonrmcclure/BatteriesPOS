<template>
    <div class="customer-info pull-left">
        <p class="customer-name"><b>Name:</b> {{ customer.first_name }} {{ customer.last_name }}</p>
        <p class="customer-address"><b>Address:</b> {{ customer.address }}</p>
        <p class="customer-city"><b>City:</b> {{customer.city}}<span class="customer-pc"> <b>PC:</b> {{ customer.postal_code }}</span></p>
        <p class="customer-primary-phone"><b>Primary Phone:</b> {{customer.primary_phone}}</p>
        <input id="phone-search" v-model="phone" @change="getCustomer()">
    </div>
</template>

<script lang="babel">
    export default {
        data () {
            return {
                customer: [],
                phone: '',
            }
        },

        ready() {
            this.getLocation();
        },

        methods: {
            getCustomer() {
                this.$http.get('http://api.batteriespos.dev/v0/customers?phone=' + this.phone + '&api_token=token', function(response) {
                    this.customer = response[0].data[0][0];
                }).error((err) => console.log(err));
            },

            getLocation() {
                this.$http.get('http://api.batteriespos.dev/v0/customers?api_token=token', function(response) {
                    this.phone = response[0].user[0].phone_number;
                    console.log(response[0].user[0].phone_number);
                    this.getCustomer();
                    this.phone = '';
                }).error((err) => console.log(err));
            }
        }
    }
</script>