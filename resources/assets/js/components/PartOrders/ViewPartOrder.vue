<template>
<a href="/print/part-order/{{partOrder.id}}?print=true" target="_blank" rel="noopener noreferrer"><button>Print Order</button></a>

<button @click="updatePartOrder()">Update Order</button>
<form id="part-order-form">
    <input type="hidden" name="api_token" value="{{location.api_token}}"/>
    <input type="hidden" name="customer-id" id="customer-id" v-model="customer.id" readonly/>
    <input type="hidden" name="invoice" id="invoice" v-model="partOrder.invoice.id" readonly/>
    <input type="hidden" name="rep_id" v-model="rep.id"/>
    <customer :customer.sync="customer" :location.sync="location"></customer>
    <p style="float: right">Part Order: <input type="text" name="part-order-id" id="part-order-id" v-model="partOrder.id"/></p>
    <label for="referred-by">Referred By</label>
    <input type="text" name="referred-by" id="referred-by" v-model="partOrder.referred_by"/>

    <label for="make">Make</label>
    <input name="make" id="make" type="text" v-model="partOrder.make"/>

    <label for="item">Item</label>
    <input type="text" name="item" id="item" v-model="partOrder.item">

    <label for="model">Model</label>
    <input name="model" id="model" type="text" v-model="partOrder.model"/>

    <label for="staff">Staff</label>
    <input name="staff" id="staff" type="text" v-model="partOrder.staff.first_name"/>

    <label for="sku">Sku</label>
    <input name="sku" id="sku" type="text" v-model="partOrder.sku"/>

    <label for="description">Description</label>
    <input name="description" id="description" type="text" v-model="partOrder.description"/>

    <label for="part-number">Part Number</label>
    <input name="part-number" id="part-number" type="text" v-model="partOrder.part_number"/>

    <label for="deposit">Deposit</label>
    <input name="deposit" id="deposit" type="text" v-model="partOrder.deposit"/>


    <label for="pick-up-location">Pick Up Location</label>
    <input name="pick-up-location" id="pick-up-location" type="text" v-model="partOrder.pick_up_location"/>

    <label for="notes">Notes</label>
    <textarea name="notes" id="notes" v-model="partOrder.notes"></textarea>

    <table class="products">
        <tr>
            <th>SKU</th>
            <th>Description</th>
            <th>QTY</th>
            <th>Discount</th>
            <th>Unit $</th>
            <th>Extended</th>
            <th>PST</th>
            <th>GST</th>
            <th>Total</th>

        </tr>

        <tr v-for="product in partOrder.invoice.sale">
           <td><input type="text" name="sku[]" value="{{ product.sku }}" readonly/></td>
           <td><input type="text" name="description[]" value="{{ product.description }}" readonly/></td>
           <td><input type="text" name="quantity[]" value="{{ product.quantity }}" readonly/></td> <!-- This needs to be completely reworked and use something like onChange=getPrices($index)-->
           <td><input type="text" name="discount[]" value="{{ product.discount }}" readonly/></td>
           <td><input type="text" name="unit-price[]" value="{{ product.price }}" readonly/></td>
           <td><input type="text" name="extended[]" value="{{ product.extended }}" readonly/></td>
           <td><input type="text" name="pst[]" value="{{ product.pst }}" readonly/></td>
           <td><input type="text" name="gst[]" value="{{ product.gst }}" readonly/></td>
           <td><input type="text" name="sku-total[]" value="{{ product.total }}" readonly/></td>
        </tr>

    </table>

    <!--<input type="submit" value="Submit" @click.capture="updatePartOrder"/>-->
</form>

<!--<rep-login-modal :show.sync="showRepLogin" title="Rep Login" :customer="customer" :location="location"></rep-login-modal>
<button @click="newSale()">Issue Invoice</button>-->
</template>


<script lang="babel">
import Modal from '../Modals/Modal.vue';
import Customer from '../Customer/Customer.vue';
import RepLoginModal from '../Modals/RepLoginModal.vue';

export default Modal.extend({

    props: ['show', 'title', 'newPartOrder', 'location'],

    components: {Modal, Customer, RepLoginModal},

    data() {
        return {
            customer: [],
            showRepLogin: false,
            repName: '',
            rep: [],
            partOrder: [],
            pathArray: window.location.pathname.split( '/' ),
        }
    },

    ready() {
        this.getPartOrder();
    },

    methods: {

        newSale() {
            this.showRepLogin = true;
        },

        updatePartOrder() {

            var formData = new FormData(document.querySelector('#part-order-form'));
            var url = '/api/v0/part-orders/' + this.pathArray[2];
            this.$http.post(url, formData)
            .then(function(response) {
                //Success
                this.$dispatch('new-part-order');
                this.$broadcast('new-part-order');
                this.close();
            }, function(response) {
                //TODO: Proper flash message
                console.log(response);
            });               
        },

        getPartOrder(e) {
            var url = '/api/v0/part-orders?id=' + this.pathArray[2] + '&with=customer,staff,invoice.sale';
            this.$http.get(url, {api_token: 'token'})
            .then(function(response) {
                //Success
                this.$set('partOrder', response.data.data[0]);
                this.$set('customer', response.data.data[0].customer);
            }, function(response) {
                //TODO: Proper flash message
                console.log(response);
            });               
        }
    }

});
</script>
