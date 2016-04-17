import Modal from './Modal';

export default Modal.extend({

    template: `
        <modal :show.sync="show" :on-close="close" :title.sync="title">
            
            <div class="Modal__body">
                <slot>
                    Total: {{total}}<br />
                    Invoice: {{invoice}}<br />
                    <button @click="completeSale()">Click</button><br />
                    <input class="sku" id="sku" v-model="sku" @change="addProduct" placeholder="Sku" tab-index="1">  <input v-model="quantity" @change="calculatePrice()" placeholder="Quantity">
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
                            <th></th>
                        </tr>

                        <tr v-for="product in products">
                            <td>{{ product.sku }}</td>
                            <td>{{ product.description }}</td>
                            <td>{{ prices[$index].quantity }}</td>
                            <td>{{ prices[$index].discount }}</td>
                            <td>{{ product.unit_price }}</td>
                            <td>{{ prices[$index].extended }}</td>
                            <td>{{ prices[$index].pst }}</td>
                            <td>{{ prices[$index].gst }}</td>
                            <td>{{ prices[$index].sku_total }}</td>
                            <td @click="removeProduct(product, $index)">X</td>
                        </tr>
    
                    </table>
                    <select v-model="invoice_comment">
                        <option selected>Returns may be subject to a 25% restocking fee.</option>
                        <option>Small appliance repairs have a 30 day service warranty.</option>
                        <option>Thank you for your business.</option>
                        <option>To ensure quality, batteries are a non-refundable item.</option>
                    </select>
                </slot>
            </div>

            <div class="Modal__footer">
                <span class="payment-method">
                    <p>CASH | DEBIT | MASTERCARD | VISA</p>
                </span>
            </div>
        </modal>
    `,

    props: ['show', 'title', 'rep', 'location', 'invoice'],

    components: {Modal},

    data() {
        return {
            products: [],
            prices: [],
            customer: [],
            sku: '',
            quantity: '',
            invoice_comment: ''
        }
    },

    ready() {
        this.getCustomer();
    },

    computed: {
        total: function() {
            var total = 0;
            for(var i = 0; i < this.prices.length; i++)
            {
                total += Number(this.prices[i]['sku_total']);
            }

            return Number(total).toFixed(2);

        }
    },

    methods: {
        close() {
            this.clearData();
            this.show = false;
            
        },

        clearData() {
            this.products = [];
            this.prices = [];
            this.sku = '';
            this.quantity = '';
            this.invoice = '';
        },

        getCustomer() {
            var url = 'http://api.batteriespos.dev/v0/customers?phone=' + this.location.phone_number + '&location_id=' + this.location.id + '&api_token=' + this.location.api_token;
            
            this.$http.get(url).then(function(response) {
                      // get status
                this.$set('customer', response.data.data[0]);
            }, function(response) {
                //TODO: Error
            });
        },

        getProduct(sku) {
              var url = 'http://api.batteriespos.dev/v0/inventory?sku=' + sku;
              
              this.$http.get(url, {api_token: this.location.api_token}).then(function(response) {
                  this.products.push(response.data.data[0]);

              }, function(response) {
                  this.$set('error', 'The Rep does not exist!');
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

        calculatePrice(product = null) {
            if(!this.products.length > this.prices.length) {
                this.sku = '';
                this.quantity = ''; 
            }
            var index = this.products.length - 1;
                var extended = (this.quantity * this.products[index]['unit_price']).toFixed(2);
                var pst = (extended*0.07).toFixed(2);
                var gst = (extended*0.05).toFixed(2);
                var total = Number(Number(extended)+Number(pst)+Number(gst)).toFixed(2);
                var price = {
                    quantity: this.quantity,
                    extended: Number(extended).toFixed(2),
                    discount: 0.00,
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

        removeProduct(product, index) {
            this.products.$remove(product);
            this.prices.$remove(this.prices[index]);
        },

        completeSale() {
            var url = '//api.batteriespos.dev/v0/sales';
              
            this.$http.post(url, {
                products: this.products, 
                prices: this.prices, 
                invoice: this.invoice, 
                location: this.location, 
                total: this.total,
                customer: this.customer,
                invoice_comment: this.invoice_comment,
                rep: this.rep,
                printed: false,
                method: 'Cash',
                api_token: this.location.api_token
            })
            .then(function(response) {
                //Success
                this.close();
            }, function(response) {
                //TODO: Proper flash message
            });
        },
    }
});