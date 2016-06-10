<template>
    <modal :show.sync="show" :on-close="close" :title.sync="title">

        <div class="Modal__body">
            <form method="POST" action="http://api.batteriespos.dev/v0/customers" v-ajax>
                <input type="hidden" name="api_token" value="{{location.api_token}}"/> 
                <div>
                    <input type="text" name="customer-first-name" id="customer-first-name" placeholder="First Name" v-model="customer.first_name"/>
                    <input type="text" name="customer-last-name" id="customer-last-name" placeholder="Last Name" v-model="customer.last_name"/>
                </div>
                <div>
                    <input type="text" name="customer-company" id="customer-company" placeholder="Company" v-model="customer.company">
                </div>
                <div>
                    <input type="text" name="customer-address" id="customer-address" placeholder="Address" v-model="customer.address"/> 
                    <input type="text" name="customer-city" id="customer-city" placeholder="City" v-model="customer.city"/>
                    <input type="text" name="customer-province" id="customer-province" placeholder="Province" v-model="customer.province"/>
                    <input type="text" name="customer-country" id="customer-country" placeholder="Country" v-model="customer.country"/>
                    <input type="text" name="customer-postal-code" id="customer-postal-code" placeholder="Postal Code" v-model="customer.postal_code"/>
                </div>
                <div>
                    <input type="text" name="customer-primary-phone" id="customer-primary-phone" placeholder="Primary Phone" v-model="customer.primary_phone"/>
                    <input type="text" name="customer-secondary-phone" id="customer-secondary-phone" placeholder="Secondary Phone" v-model="customer.secondary_phone"/>
                    <input type="text" name="customer-email" id="customer-email" placeholder="Email" v-model="customer.email"/>
                </div>
                <div>  
                    <input type="text" name="customer-comments" id="customer-comments" placeholder="Comments" v-model="customer.comments"/>
                    <input type="text" name="customer-store-credit" id="customer-store-credit" placeholder="Store Credit" v-model="customer.store_credit"/>
                </div>

                <input type="submit" value="Add Customer" @click="close"/>
            </form>
        </div>

        <div class="Modal__footer">
           
        </div>
    </modal>
</template>


<script>
    import Moment from 'moment';
    import Modal from './Modal.vue';
    import ReceiptModal from './ReceiptModal.vue';
    import Customer from '../Customer/Customer.vue';

    export default Modal.extend({

        props: ['show', 'title', 'location'],

        components: {Modal, Customer},

        data() {
            return {
                customer: {
                    province: 'British Columbia',
                    country: 'Canada'
                },
            }
        },

        ready() {
            //this.getCustomer();
            // TODO: Get value of PST and GST from a "settings" table
        },

        methods: {
            close() {
                this.show = false;
                this.$dispatch('new-customer');
            },

        }
    });
</script>
