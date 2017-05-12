<template>
    <div class="col-md-9 module-container">
        <div class="module">
            <div class="product-wrapper">
                <div class="product-info">
                    <table>
                        <tr>
                            <th>Sku</th>
                            <th>Description</th>
                            <th>Manufacturer</th>
                            <th>Part Number</th>
                            <th>Retail Price</th>
                        </tr>

                        <tr>
                            <td>{{product.sku}}</td>
                            <td>{{product.description}}</td>
                            <td>{{product.manufacturer}}</td>
                            <td>{{product.model_number}}</td>
                            <td>${{product.unit_price}}</td>
                        </tr>
                    </table>
                </div>
                <hr />
                <div class="product-image">
                    <img src="/img/products/{{product.image}}"/>
                </div>

                <div>  
                    <h3>Sales History <small>(Last 5)</small></h3>
                    <table class="table-results">
                        <tr>
                            <th>Invoice</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Method</th>
                            <th>Staff</th>
                            <th>Date <small><em>(YYYY-MM-DD)</em></small></th>
                        </tr>
                            <tr v-for="sale in history">
                                <td><a href="/invoices/{{sale.invoice.id}}">{{sale.invoice.id}}</a></td>
                                <td>{{sale.description}}</td>
                                <td>{{sale.quantity}}</td>
                                <td>${{sale.price}}</td>
                                <td>{{sale.invoice.payment_method}}</td>
                                <td>{{sale.invoice.staff}}</td>
                                <td>{{sale.created_at | moment}}</td>
                            </tr>
                    </table>
                    <a href="/inventory/sales-history/{{product.sku}}"><button>sale history</button></a>
                    <button id="test" @click="showSearch()">Search Sku</button>
                    <input class="search hidden" type="text" placeholder="Enter Sku" v-model="sku" @keyup.enter="searchSku(sku)"/>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3 module-container">
        <div class="module">
            <div class="product-wrapper">
                <div class="qoh">
                    <h3>Quantity On Hand</h3>
                    <table>
                        <tr>
                            <th v-for="location in qoh" id="{{location.location.location_code}}"> {{location.location.location_code}}</th>
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

    props: ['location'],

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
            this.highlightCurrentLocation();
        }.bind(this));
    },

    methods: {
        getInfo(sku) {
            this.getProduct(sku);
            this.getQoh(sku);
            this.getHistory(sku);
        },

        highlightCurrentLocation() {
            //TODO
        },

        showSearch() {
            $("#test").hide();
            this.sku = '';
            $(".search").removeClass("hidden");
            $(".search").focus();
        },

        searchSku(sku) {
            var url = '/inventory/' + sku;
              
            document.location.href = url;
        },

        getProduct(sku) {
            var url = '/api/v0/inventory?sku=' + sku + '&with=qoh';

            this.$http.get(url, {api_token: this.location.api_token}).then(function(response) {
                this.$set('product', response.data.data[0]);

            }, function(response) {
            // error callback
            });
        },

        getQoh(sku) {
            var url = '/api/v0/qoh?sku=' + sku + '&with=location';
              
            this.$http.get(url, {api_token: this.location.api_token}).then(function(response) {
                this.$set('qoh', response.data.data);

            }, function(response) {
            // error callback
            });
        },

        getHistory(sku) {
            var url = '/api/v0/sales?sku=' + sku + '&with=invoice&order_by=created_at,desc&limit=5';
              
            this.$http.get(url, {api_token: this.location.api_token}).then(function(response) {
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
            return Moment(date).format('YYYY-MM-DD @ H:mm');
        }
            return 'No Sales History';
      }
    }


});

</script>