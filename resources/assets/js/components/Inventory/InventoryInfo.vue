<template>
    <div class="col-md-8 module-container">
        <div class="module">
            <div class="product-wrapper">
                <div class="product-info">
                    <p class="sku">{{product.sku}}</p>
                    <p class="description">{{product.description}}</p>
                    <p class="price">${{product.unit_price}}</p>
                </div>
                <hr />
                <div class="product-image">
                    <img src="{{product.image}}"/>
                </div>

                <div class="sales-history">  
                    <h3>Sales History</h3>
                    <table>
                        <tr>
                            <th>Invoice</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Method</th>
                            <th>Staff</th>
                            <th>Date</th>
                        </tr>
                            <tr v-for="sale in history">
                                <td>{{sale.invoice.id}}</td>
                                <td>{{sale.quantity}}</td>
                                <td>${{sale.price}}</td>
                                <td>{{sale.invoice.payment_method}}</td>
                                <td>{{sale.invoice.staff}}</td>
                                <td>{{sale.created_at | moment}}</td>
                            </tr>
                    </table>
                    <a href="#"><button>sale history</button></a>
                    <input type="text" placeholder="Search By Sku" v-model="sku" @keyup.enter="searchSku(sku)"/>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 module-container">
        <div class="module">
            <div class="product-wrapper">
                <div class="qoh">
                    <h3>Quantity On Hand</h3>
                    <table>
                        <tr>
                            <th v-for="location in qoh">{{location.location.location_code}}</th>
                        </tr>

                        <tr>
                            <td v-for="quantity in qoh">{{quantity.quantity}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Vue from 'vue';
import Moment from 'moment';

export default Vue.extend({

    data() {
        return {
            sku: '',
            description: '',
            last_sale: '',
            product: [],
            qoh: []
        }
    },

    ready(sku) {
        var temp = window.location.href.split('/');
        this.sku = temp[4];
        Vue.nextTick(function () {
            this.getInfo(this.sku);
        }.bind(this));
    },

    methods: {
        getInfo(sku) {
            this.getProduct(sku);
            this.getQoh(sku);
            this.getHistory(sku);
        },

        searchSku(sku) {
            var url = '/inventory/' + sku;
              
            document.location.href = url;
        },

        getProduct(sku) {
            var url = '/api/v0/inventory?sku=' + sku + '&with=qoh';

            this.$http.get(url, {api_token: 'token'}).then(function(response) {
                this.$set('product', response.data.data[0]);

            }, function(response) {
            // error callback
            });
        },

        getQoh(sku) {
            var url = '/api/v0/qoh?sku=' + sku + '&with=location';
              
            this.$http.get(url, {api_token: 'token'}).then(function(response) {
                this.$set('qoh', response.data.data);

            }, function(response) {
            // error callback
            });
        },

        getHistory(sku) {
            var url = '/api/v0/sales?sku=' + sku + '&with=invoice&order_by=created_at,desc&limit=5';
              
            this.$http.get(url, {api_token: 'token'}).then(function(response) {
                this.$set('history', response.data.data);

            }, function(response) {
            // error callback
            });
        }
    },

    filters: {
      moment: function (date) {
        if(date !== 'No Previous Sale' && date !== '')
        {
            return Moment(date).format('MMMM Do YYYY, H:mm');
        }
            return 'No Sales History';
      }
    }


});

</script>