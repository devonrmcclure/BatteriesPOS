<template>
    <div class="col-md-9 module-container">
        <div class="module">
           <h3>Recent Sales <small>(Last 5)</small></h3>
           <table class="table-results">
                <tr>
                    <th>Invoice #</th>
                    <th>Sold By</th>
                    <th>Method</th>
                    <th>Total</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
                
                <tr v-for="invoice in history">
                    <td><a href="/invoices/{{invoice.id}}">{{invoice.id}}</a></td>
                    <td><a href="/invoices/{{invoice.id}}">{{invoice.staff}}</a></td>
                    <td><a href="/invoices/{{invoice.id}}">{{invoice.payment_method}}</a></td>
                    <td><a href="/invoices/{{invoice.id}}">${{invoice.total.toFixed(2)}}</a></td>
                    <td><a href="/invoices/{{invoice.id}}">{{invoice.created_at | moment}}</a></td>
                    <td><button><a href="/print/sales/{{invoice.id}}?print=true&duplicate=true">reprint</a></button></td>
                </tr>

           </table>
        </div>
    </div>

    <div class="col-md-3 module-container">
        <div class="module">
            <h3>Search Invoice</h3>
            <input class="search" type="text" placeholder="Invoice Number" v-model="invoice" @keyup.enter="searchInvoice(invoice)"/>
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
            invoice: '',
            history: []
        }
    },

    ready(sku) {
        this.getHistory();
    },

    methods: {
        getInfo(sku) {
            this.getProduct(sku);
            this.getQoh(sku);
            this.getHistory(sku);
        },

        searchInvoice(invoice) {
            var url = '/invoices/' + invoice + '?duplicate=true';
              
            document.location.href = url;
        },

        
        getHistory(sku) {
            var url = '/api/v0/invoice?location=' + this.location.name + '&order_by=created_at,desc&limit=5';
              
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
            return Moment(date).format('YYYY-MM-D @ H:mm');
        }
            return 'No Sales History';
      }
    }


});

</script>