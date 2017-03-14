	<template>
    <modal :show.sync="show" :on-close="close" :title.sync="title">

        <div class="Modal__body">

            <form id="new-repair-order-form">
                <input type="hidden" name="api_token" value="{{location.api_token}}"/> 
                <customer :customer.sync="customer" :location.sync="location"></customer>
                
                <div class="important-info">
                    <label for="orderNumber">Repair Order Number:</label>
                    <input type="text" name="orderNumber" id="orderNumber" value="{{orderNumber}}" readonly/>
                    <label for="referred-by">Referred By</label>
                    <select name="referred-by" id="referred_by">
                        <option value="-- SELECT ONE --" selected>-- SELECT ONE --</option>
                        <option value="Oster">Oster</option>
                    </select>

                    <label for="call-if-over">Call if Over</label>
                    <input name="call-if-over" id="call-if-over" type="text"/>

                    <label for="original-receipt">Receipt</label>
                    <input name="original-receipt" id="original-receipt" type="text" placeholder="yes/no">

                    <label for="deposit">Deposit</label>
                    <input name="deposit" id="deposit" type="text"/>

                    <label for="date-code">Deposit Invoice</label>
                    <input name="deposit-invoice" id="deposit-invoice" v-model="invoice" type="text"/>

                    <label for="staff">Staff</label>
                    <input name="staff" id="staff" type="text"/>

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
                    <label for="problem">Problem</label>
                    <br />
                    <textarea name="problem" id="problem"></textarea>
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

        props: ['show', 'title', 'newRepairOrder', 'location'],

        components: {Modal, Customer, RepLoginModal},

        data() {
            return {
                customer: [],
                ro_customer: [],
                showRepLogin: false,
                invoice: '',
                deposit: '',
                orderNumber: ''

            }
        },

        ready() {
            this.getRepairOrderNumber();
        },

        methods: {
            close() {
                this.show = false;
                this.invoice = '';
            },

            newSale() {
                this.showRepLogin = true;
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
                }, function(response) {
                    //TODO: Proper flash message
                    console.log(response);
                });               
            },

            getRepairOrderNumber() {
                var url = '/api/v0/repair-orders?order_by=created_at,desc&location_id=' + this.location.id;

                this.$http.get(url, {api_token: this.location.api_token})
                .then( function(response) {
                    //Success
                    this.$set('orderNumber', Number(response.data.data[0].id+1));
                }, function(response) {
                    //Error

                    switch(this.location.name) {
                        case "Head Office":
                            this.orderNumber = 0;
                            break;
                        case "Richmond":
                            this.orderNumber = 20000;
                            break;
                        case "White Rock":
                            this.orderNumber = 30000;
                            break;
                        case "Guildford":
                            this.orderNumber = 60000;
                            break;
                        case "Nanaimo":
                            this.orderNumber = 70000;
                            break;
                        case "Maple Ridge":
                            this.orderNumber = 80000;
                            break;
                        default:
                            //Throw error
                            console.log('ERROR');
                    }
                });
            }
        }
    });
</script>
