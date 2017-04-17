<template>
    <div class="col-md-9 module-container">
        <div class="module">
            <div class="sales-invoice-info">
                <div class="customer-info">
                    <p class="name">{{invoice.customer.first_name}} {{invoice.customer.last_name}}</p>
                    <p class="address">{{invoice.customer.address}} {{invoice.customer.city}} {{invoice.customer.province}}</p>
                    <p class="primary_phone">{{invoice.customer.primary_phone}}</p>
                </div>

                <div class="invoice-info">
                    <p class="invoice-number"><span class="heading">Invoice: </span>{{invoice.id}}</p>
                    <p class="method"><span class="heading">Method: </span>{{invoice.payment_method}}</p>
                    <p class="staff"><span class="heading">Sold By: </span>{{invoice.staff}}</p>
                    <p cladd="date"><span class="heading">Date: </span>{{invoice.created_at | moment}}</p>
                </div>

                <div class="invoice-products">
                    <table>
                        <tr>
                            <th>Sku</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Extended</th>
                            <th>PST</th>
                            <th>GST</th>
                            <th>Total</th>
                        </tr>

                        
                        <tr v-for="product in invoice.sale"> 
                            <td><p class="product-sku">{{product.sku}}</p></td>
                            <td><p class="product-description">{{product.description}}</p></td>
                            <td><p class="product-quantity">{{product.quantity}}</p></td>
                            <td><p class="product-price">${{product.price.toFixed(2)}}</p></td>
                            <td><p class="product-extended">${{product.extended.toFixed(2)}}</p></td>
                            <td><p class="product-pst>">${{product.pst.toFixed(2)}}</p></td>
                            <td><p class="product-gst">${{product.gst.toFixed(2)}}</p></td>
                            <td><p class="product-total">${{product.total.toFixed(2)}}</p></td>
                        </tr>
                   

                        <tr>
                            <td colspan=4></td>
                            <th>Total</th>
                            <th>${{invoice.total_pst.toFixed(2)}}</th>
                            <th>${{invoice.total_gst.toFixed(2)}}</th>
                            <th>${{invoice.total.toFixed(2)}}</th>

                        </tr>
                    </table>
                </div>

                <div class="invoice-comment">
                    <p class="comment">{{invoice.invoice_comment}}</p>
                </div>
            </div>

            <a href="/print/sales/{{invoice.id}}?print=true&duplicate=true"><button>reprint</button></a>
        </div>
    </div>

    <div class="col-md-3 module-container">
        <div class="module">
            <h3>Search Invoice</h3>
            <input class="search" type="text" placeholder="Invoice Number" v-model="invoiceSearch" @keyup.enter="searchInvoice(invoiceSearch)"/>
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
            invoiceNumber: '',
            invoice: [],
            invoiceSearch: ''
        }
    },

    ready() {
        var temp = window.location.href.split('/');
        this.invoiceNumber = temp[4];
        Vue.nextTick(function () {
            this.getHistory(this.invoiceNumber);
        }.bind(this));
    },

    methods: {
        getInfo(sku) {
            this.getProduct(sku);
            this.getQoh(sku);
            this.getHistory(sku);
        },

        searchInvoice(invoice) {
            var url = '/invoices/' + invoice;
              
            document.location.href = url;
        },

        
        getHistory(invoice) {
            var url = '/api/v0/invoice?id=' + invoice + '&location=' + this.location.name + '&with=sale,customer';
              
            this.$http.get(url, {api_token: this.location.api_token}).then(function(response) {
                this.$set('invoice', response.data.data[0]);

            }, function(response) {
            // error callback
            });
        }
    },

    filters: {
      moment: function (date) {
        if(date !== 'No Previous Sale' && date !== '')
        {
            return Moment(date).format('YYYY-MM-D @ H:mm');
        }
            return 'No Sales History';
      }
    }


});

</script>