<template>
    <div class="col-md-12 module-container">
        <div class="col-md-12 module-container">
            <div class="module admin-part-orders">
                <form id="part-order-form">
                    <customer :customer.sync="customer" :location.sync="location"></customer>
                    <p style="float: right">Part Order: {{partOrder.id}}</p>
                    <label for="referred-by">Referred By</label>
                    <select name="referred-by" id="referred_by" v-model="partOrder.referred_by">
                        <option value=""></option>
                        <option value="Oster">Oster</option>
                    </select>

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
            </div>
        </div>
    </div>
</template>

<script>
import Vue from 'vue';
import Customer from './../../Customer/Customer.vue';
import Moment from 'moment';

export default Vue.extend({

    props: ['location'],

    components: {Customer},

    data() {
        return {
            partOrder: [],
            pathArray: window.location.pathname.split( '/' ),
        }
    },

    ready() {
        this.getPartOrder();
    },

    computed: {
        today: function() {
            var date = new Date();
            var month = date.getMonth() + 1;
            var day = date.getDate();
            var year = date.getFullYear();

            var dateString = year + '-' + (('0' + month).slice(-2)) + '-' + (('0' + day).slice(-2))

            return dateString;
        },
    },

    methods: {

        getPartOrder(e) {
            var url = '/api/v0/part-orders?id=' + this.pathArray[3] + '&with=customer,staff,invoice.sale';
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
    },

    filters: {
        moment: function (date) {
        if(date !== '' && date !== '0000-00-00 00:00:00' && date !== null)
        {
            return Moment(date).format('YYYY-MM-DD @ H:mm');
        }
            return 'Not Yet';
        }
    }
});

</script>