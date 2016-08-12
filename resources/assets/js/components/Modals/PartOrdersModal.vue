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

            <label for="part-order-id">Part Order #:</label>
            <input name="part-order-id" id="part-order-id" type="text" v-model="partOrderID">

            <label for="make">Make</label>
            <input name="make" id="make" type="text"/>

            <label for="item">Item</label>
            <input type="text" name="item" id="item">

            <label for="model">Model</label>
            <input name="model" id="model" type="text"/>

            <label for="staff">Staff</label>
            <input name="staff" id="staff" type="text"/>

            <label for="part-number">Part Number</label>
            <input name="part-number" id="part-number" type="text"/>

            <label for="deposit">Deposit</label>
            <input name="deposit" id="deposit" type="text"/>

            <label for="pick-up-location">Pick Up Location</label>
            <input name="pick-up-location" id="pick-up-location" type="text"/>

            <label for="notes">Notes</label>
            <textarea name="notes" id="notes"></textarea>
            <br />
            <input class="sku" id="sku" v-model="sku" @change="addProduct" placeholder="Sku" tab-index="1">  <input v-model="quantity" @change="calculatePrice()" placeholder="Quantity">
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
                    <td><input type="text" name="sku[]" v-model="product.sku"/></td>
                    <td><input type="text" name="description[]" value="{{ product.description }}" readonly/></td>
                    <td><input type="text" name="quantity[]" v-model="prices[$index].quantity" @change="updatePrice($index)"/></td> <!-- This needs to be completely reworked and use something like onChange=getPrices($index)-->
                    <td><input type="text" name="discount[]" v-model="prices[$index].discount" @change="updatePrice($index)"/></td>
                    <td><input type="text" name="unit-price[]" v-model="product.unit_price" @change="updatePrice($index)"/></td>
                    <td><input type="text" name="extended[]" v-model="prices[$index].extended" readonly/></td>
                    <td><input type="text" name="pst[]" v-model="prices[$index].pst" readonly/></td>
                    <td><input type="text" name="gst[]" v-model="prices[$index].gst" readonly/></td>
                    <td><input type="text" name="sku-total[]" v-model="prices[$index].sku_total" readonly/></td>
                </tr>

            </table>

            <input type="submit" value="Submit" @click.capture="newPartOrder"/>
        </form>

        <rep-login-modal :invoice.sync="invoice" :show.sync="showRepLogin" :prices="prices" :products="products" title="Rep Login" :customer="customer" :location="location"></rep-login-modal>
        <button @click="newSale()">Issue Invoice</button>
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
            products: [],
            prices: [],
            sku: '',
            quantity: '',
            invoice_comment: '',
            paymentMethod: '',
            invoice: '',
            partOrderID: '1000'
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

        getProduct(sku) {
              var url = 'http://api.batteriespos.dev/v0/inventory?sku=' + sku;

              this.$http.get(url, {api_token: this.location.api_token}).then(function(response) {
                  this.products.push(response.data.data[0]);

              }, function(response) {
                  this.$set('error', 'The sku does not exist!');
            // error callback
              });
        },

        addProduct() {
            if(!(this.products.length - this.prices.length) < 1)
            {
                this.sku = '';
                alert('Please enter a quantity for already entered product!');
                return;
            }
            this.getProduct(this.sku);
            this.sku = '';

        },

        calculatePrice() {
            // Calc price if item just added
            // Update price based on index and discount/manually set unit_price
            // 
            if(!this.products.length > this.prices.length) {
                this.sku = '';
                this.quantity = '';
            }
            
            var index = this.products.length - 1;

            var extended = (this.quantity * this.products[index]['unit_price']).toFixed(2);

            var pst = this.calculatePST(this.products[index], extended);
            var gst = this.calculateGST(this.products[index], extended);

            var total = Number(Number(extended)+Number(pst)+Number(gst)).toFixed(2);
            var price = {
                quantity: this.quantity,
                extended: Number(extended).toFixed(2),
                discount: Number(0.00).toFixed(2),
                pst: Number(pst).toFixed(2),
                gst: Number(gst).toFixed(2),
                sku_total: Number(total).toFixed(2),
            };

            this.prices.push(price);

            this.sku = '';
            this.quantity = '';
            setTimeout(function(){
                $("#sku").focus();
            }, 0);
        },

        calculatePST(product, extended) {
            var pst = 0.00;
            if(product.pst == 1) {
                pst = (extended*0.07).toFixed(2);
            }

            return pst;
        },

        calculateGST(product, extended) {
            var gst = 0.00;
            if(product.gst == 1) {
                gst = (extended*0.05).toFixed(2);
            }

            return gst;
        },

        updatePrice(index) {
            var extended = (this.prices[index].quantity * this.products[index]['unit_price']).toFixed(2);

            if(this.prices[index].discount != 0) {
                extended = (extended - (extended * (this.prices[index].discount/100))).toFixed(2);
            }

            var pst = this.calculatePST(this.products[index], extended);
            var gst = this.calculateGST(this.products[index], extended);

            var total = Number(Number(extended)+Number(pst)+Number(gst)).toFixed(2);
            var price = {
                quantity: this.prices[index].quantity,
                extended: Number(extended).toFixed(2),
                discount: Number(this.prices[index].discount).toFixed(2),
                pst: Number(pst).toFixed(2),
                gst: Number(gst).toFixed(2),
                sku_total: Number(total).toFixed(2),
            };  

            
            this.prices.$set(index, price);

            this.sku = '';
            this.quantity = '';
            setTimeout(function(){
                $("#sku").focus();
            }, 0);
        },

        removeProduct(product, index) {
            this.products.$remove(product);
            this.prices.$remove(this.prices[index]);
        },
    }

});
</script>
