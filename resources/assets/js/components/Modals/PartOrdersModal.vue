<template>
<modal :show.sync="show" :on-close="close" :title.sync="title">

    <div class="Modal__body">
        <form method="POST" id="new-part-order-form" action="http://api.batteriespos.dev/v0/part-orders">
            <input type="hidden" name="api_token" value="{{location.api_token}}"/>
            <input type="hidden" name="rep_id" v-model="rep.id"/>
            <customer :customer.sync="customer" :location.sync="location"></customer>
            <label for="referred-by">Referred By</label>
            <select name="referred-by" id="referred_by">
                <option value=""></option>
                <option value="Oster">Oster</option>
            </select>

            <label for="make">Make</label>
            <input name="make" id="make" type="text"/>

            <label for="item">Item</label>
            <input type="text" name="item" id="item">

            <label for="model">Model</label>
            <input name="model" id="model" type="text"/>

            <label for="staff">Staff</label>
            <input name="staff" id="staff" type="text"/>

            <label for="sku">Sku</label>
            <input name="sku" id="sku" type="text"/>

            <label for="description">Description</label>
            <input name="description" id="description" type="text"/>

            <label for="part-number">Part Number</label>
            <input name="part-number" id="part-number" type="text"/>

            <label for="deposit">Deposit</label>
            <input name="deposit" id="deposit" type="text"/>


            <label for="pick-up-location">Pick Up Location</label>
            <input name="pick-up-location" id="pick-up-location" type="text"/>

            <label for="notes">Notes</label>
            <textarea name="notes" id="notes"></textarea>
                
            <table class="products">
                <tr>
                    <th></th>
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

                <tr v-for="product in products">
                    <td @click="removeProduct(product, $index)">X</td>
                    <td><input type="text" name="sku[]" value="{{ product.sku }}"/></td>
                    <td><input type="text" name="description[]" value="{{ product.description }}" readonly/></td>
                    <td><input type="text" name="quantity[]" value="{{ prices[$index].quantity }}" @change="calculatePrice()"/></td> This needs to be completely reworked and use something like onChange=getPrices($index)
                    <td><input type="text" name="discount[]" value="{{ prices[$index].discount }}"/></td>
                    <td><input type="text" name="unit-price[]" value="{{ product.unit_price }}" readonly/></td>
                    <td><input type="text" name="extended[]" value="{{ prices[$index].extended }}" readonly/></td>
                    <td><input type="text" name="pst[]" value="{{ prices[$index].pst }}" readonly/></td>
                    <td><input type="text" name="gst[]" value="{{ prices[$index].gst }}" readonly/></td>
                    <td><input type="text" name="sku-total[]" value="{{ prices[$index].sku_total }}" readonly/></td>
                </tr>

            </table>

            <input type="submit" value="Submit" @click.capture="newPartOrder"/>
        </form>

        <rep-login-modal :show.sync="showRepLogin" title="Rep Login" :customer="customer" :location="location"></rep-login-modal>
        <button @click="newSale()" :invoice.sync="invoice" :products.sync="products">Issue Invoice</button>
    </div>

</modal>
</template>


<script lang="babel">
import Modal from './Modal.vue';
import Customer from '../Customer/Customer.vue';
import RepLoginModal from './RepLoginModal.vue';

export default Modal.extend({

    props: ['show', 'title', 'newPartOrder', 'location'],

    components: {Modal, Customer, RepLoginModal},

    data() {
        return {
            customer: [],
            showRepLogin: false,
            repName: '',
            rep: [],
            products: []
        }
    },

    methods: {
        close() {
            this.show = false;
        },

        newSale() {
            this.showRepLogin = true;
        },

        newPartOrder(e) {
            //TODO Validation
            e.preventDefault();
            var formData = new FormData(document.querySelector('#new-part-order-form'));
            var url = '//api.batteriespos.dev/v0/part-orders';
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
    }

});
</script>
