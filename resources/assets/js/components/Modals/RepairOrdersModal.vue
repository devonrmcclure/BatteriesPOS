	<template>
    <modal :show.sync="show" :on-close="close" :title.sync="title">

        <div class="Modal__body">

            <form id="new-repair-order-form">
                <input type="hidden" name="api_token" value="{{location.api_token}}"/>
                <customer :customer.sync="customer" :location.sync="location"></customer>
                
                <div class="important-info">
                    <input type="hidden" name="customer-id" v-model="customer.id" readonly/>
                    <label for="orderNumber">Repair Order Number:</label>
                    <input type="text" name="orderNumber" id="orderNumber" v-model="orderNumber" readonly/>
                    <label for="referred-by">Referred By</label>
                    <select name="referred-by" id="referred-by">
                        <option value="-- SELECT ONE --" selected>-- SELECT ONE --</option>
                        <option value="Oster">Oster</option>
                    </select>

                    <label for="call-if-over">Call if Over</label>
                    <input name="call-if-over" id="call-if-over" type="text"/>

                    <label for="original-receipt">Receipt</label>
                    <input name="original-receipt" id="original-receipt" type="text" placeholder="yes/no">

                    <label for="deposit">Deposit</label>
                    <input name="deposit" id="deposit" type="text" v-model="deposit"/>

                    <label for="date-code">Deposit Invoice</label>
                    <input name="deposit-invoice" id="deposit-invoice" v-model="invoice" type="text"/>

                    <label for="staff">Staff</label>
                    <select name="staff" id="staff">
                        <option v-for="person in staff[0]" value="{{person.id}}">{{person.first_name}}</option>
                    </select>

                    <label for="invoice">Invoice#</label>
                    <input name="invoice" id="invoice" type="text" v-model="invoice"/>
                </div>
               
                <div class="product-info">
                    <label for="product">Product</label>
                    <input name="product" id="product" type="text"/>

                    <label for="model">Model</label>
                    <input name="model" id="model" type="text"/>

                    <label for="type">Type</label>
                    <input name="type" id="type" type="text"/>

                    <label for="date-code">Date Code</label>
                    <input name="date-code" id="date-code" type="text"/>

                    <label for="condition">Condition</label>
                    <input name="condition" id="condition" type="text"/>

                    <label for="accessories">Accessories</label>
                    <input name="accessories" id="accessories" type="text"/>

                    <hr />
                    <div style="width: 100%;">
                        <div style="float:left; display: block; width: 45%; margin: 5px; padding: 0">
                            <label for="problem">Problem</label>
                            <br />
                            <textarea name="problem" id="problem" style="width: 100%; height: 80px;"></textarea>
                        </div>
                        <div style="float:right; display: block; width: 50%; margin: 5px; padding: 0">
                            <label for="Notes">Notes</label>
                            <br />
                            <textarea name="notes" id="notes" style="width: 100%; height: 80px;"></textarea>
                        </div>

                        <div class="clear-class"></div>
                    </div>
                </div>
                
                <br />
                
                <input type="submit" value="Submit"  @click.capture="newRepairOrder"/>
            </form>
            <rep-login-modal :show.sync="showRepLogin" :invoice.sync="invoice" :total.sync="deposit" title="Rep Login" :customer="customer" :location="location"></rep-login-modal>
            <button @click="newSale()">Issue Invoice</button>   
        </div>

    </modal>
</template>


<script lang="babel">
    import Modal from './Modal.vue';
    import Customer from '../Customer/Customer.vue';
    import RepLoginModal from './RepLoginModal.vue';
    

    export default Modal.extend({

        props: ['show', 'title', 'newRepairOrder', 'location', 'orderNumber'],

        components: {Modal, Customer, RepLoginModal},

        data() {
            return {
                customer: [],
                ro_customer: [],
                showRepLogin: false,
                invoice: '',
                deposit: '',
                staff: []

            }
        },

        ready() {
            this.getStaff();

        },

        methods: {
            close() {
                this.show = false;
                this.invoice = '';
            },

            newSale() {
                this.showRepLogin = true;
            },

            getStaff() {
                var url = '/api/v0/staff?location_id=' + this.location.id + '&api_token=' + this.location.api_token;
                this.$http.get(url)
                .then(function(response) {
                    //Success
                    console.log(response.data.data);
                    this.staff.push(response.data.data);
                }, function(response) {
                    //TODO: Proper flash message
                    
                });         
            },

            newRepairOrder(e) {
                //TODO Validation
                e.preventDefault();
                var formData = new FormData(document.querySelector('#new-repair-order-form'));
                var url = '/api/v0/repair-orders';
                this.$http.post(url, formData)
                .then(function(response) {
                    //Success
                    this.$dispatch('new-repair-order');
                    this.$broadcast('new-repair-order');
                    this.close();
                    window.open("/print/repair-order/" + this.orderNumber + "?print=true");
                }, function(response) {
                    //TODO: Proper flash message
                    var array = $.map(response.data, function(value, index) {
                        return [value];
                    });

                    alert(array.join("\n"));
                });               
            },
        }
    });
</script>
