<template>
<a href="/print/repair-order/{{repairOrder.id}}?print=true" target="_blank" rel="noopener noreferrer"><button>Print Order</button></a>

<button @click="updateRepairOrder()">Update Order</button>

<form id="repair-order-form">
    <input type="hidden" name="api_token" value="{{location.api_token}}"/>
    <customer :customer.sync="customer" :location.sync="location"></customer>
    
    <div class="important-info">
        <input type="hidden" name="customer-id" v-model="customer.id" readonly/>
        <label for="orderNumber">Repair Order Number:</label>
        <input type="text" name="orderNumber" id="orderNumber" v-model="repairOrder.id" readonly/>
        <label for="referred-by">Referred By</label>
        <input type="text" name="referred-by" id="referred-by" v-model="repairOrder.referred_by"/>

        <label for="call-if-over">Call if Over</label>
        <input name="call-if-over" id="call-if-over" type="text" v-model="repairOrder.call_if_over"/>

        <label for="original-receipt">Receipt</label>
        <input name="original-receipt" id="original-receipt" type="text" placeholder="yes/no" v-model="repairOrder.original_receipt">

        <label for="deposit">Deposit</label>
        <input name="deposit" id="deposit" type="text" v-model="repairOrder.deposit"/>

        <label for="date-code">Deposit Invoice</label>
        <input name="deposit-invoice" id="deposit-invoice" v-model="invoice" type="text" v-model="repairOrder.invoice_id"/>

        <label for="staff">Staff</label>
        <input name="staff" id="staff" type="text" v-model="repairOrder.staff.first_name"/>
    </div>
   
    <div class="product-info">
        <label for="product">Product</label>
        <input name="product" id="product" type="text" v-model="repairOrder.product"/>

        <label for="model">Model</label>
        <input name="model" id="model" type="text" v-model="repairOrder.model"/>

        <label for="type">Type</label>
        <input name="type" id="type" type="text" v-model="repairOrder.type"/>

        <label for="date-code">Date Code</label>
        <input name="date-code" id="date-code" type="text" v-model="repairOrder.date_code"/>

        <label for="condition">Condition</label>
        <input name="condition" id="condition" type="text" v-model="repairOrder.condition"/>

        <label for="accessories">Accessories</label>
        <input name="accessories" id="accessories" type="text" v-model="repairOrder.accessories"/>

        <hr />
        <div style="width: 100%;">
            <div style="float:left; display: block; width: 45%; margin: 5px; padding: 0">
                <label for="problem">Problem</label>
                <br />
                <textarea name="problem" id="problem" style="width: 100%; height: 80px;" v-model="repairOrder.problem"></textarea>
            </div>
            <div style="float:right; display: block; width: 50%; margin: 5px; padding: 0">
                <label for="Notes">Notes</label>
                <br />
                <textarea name="notes" id="notes" style="width: 100%; height: 80px;" v-model="repairOrder.notes"></textarea>
            </div>

            <div class="clear-class"></div>
        </div>
    </div>
    
    <br />
    
   <!--  <input type="submit" value="Submit"  @click.capture="newRepairOrder"/> -->
</form>

<!--<rep-login-modal :show.sync="showRepLogin" title="Rep Login" :customer="customer" :location="location"></rep-login-modal>
<button @click="newSale()">Issue Invoice</button>-->
</template>


<script lang="babel">
import Modal from '../Modals/Modal.vue';
import Customer from '../Customer/Customer.vue';
import RepLoginModal from '../Modals/RepLoginModal.vue';

export default Modal.extend({

    props: ['show', 'title', 'newRepairOrder', 'location'],

    components: {Modal, Customer, RepLoginModal},

    data() {
        return {
            customer: [],
            showRepLogin: false,
            repName: '',
            rep: [],
            repairOrder: [],
            pathArray: window.location.pathname.split( '/' ),
        }
    },

    ready() {
        this.getRepairOrder();
    },

    methods: {

        newSale() {
            this.showRepLogin = true;
        },

        updateRepairOrder() {
            //TODO Validation
            var formData = new FormData(document.querySelector('#repair-order-form'));
            var url = '/api/v0/repair-orders/' + this.pathArray[2];
            this.$http.post(url, formData)
            .then(function(response) {
                //Success
            }, function(response) {
                //TODO: Proper flash message
                console.log(response);
            });               
        },

        getRepairOrder(e) {
            var url = '/api/v0/repair-orders?id=' + this.pathArray[2] + '&with=customer,staff';
            this.$http.get(url, {api_token: this.location.api_token})
            .then(function(response) {
                //Success
                this.$set('repairOrder', response.data.data[0]);
                this.$set('customer', response.data.data[0].customer);
            }, function(response) {
                //TODO: Proper flash message
                console.log(response);
            });               
        }
    }

});
</script>
