<template>
    <div class="stats-wrapper">
        <h3>{{ title }}</h3>
        <hr />
        <table class="sales-stats">
            <tr>
                <th>Invoices</th>
                <th>Items Sold</th>
                <th>Total Sales</th>
                <th>Items/Invoice</th>
                <th>Sales/Invoice</th>
            </tr>
            <tr>
                <td>{{totalInvoices}}</td>
                <td>{{itemsSold}}</td>
                <td>{{totalSales}}</td>
                <td>{{itemsPerInvoice}}</td>
                <td>{{salesPerInvoice}}</td>
            </tr>
        </table>
    </div>
</template>

<script>
    import Vue from 'vue';

    export default Vue.extend({
        
        props: ['title', 'location'],

        ready() {
           this.calculateDailyStats();
        },

        data() {
            return {
                totalInvoices: '',
                itemsSold: '',
                totalSales: '',
                itemsPerInvoice: '',
                salesPerInvoice: ''
            }
        },
        
        computed: {
            today: function() {
                var date = new Date();
                var month = date.getMonth() + 1;
                var day = date.getDate();
                var year = date.getFullYear();

                return year + "-" + month + "-" + day;
            },
        },

        methods: {
            calculateDailyStats() {
                this.getSalesData();
            },

            getSalesData() {
                var url = '//api.batteriespos.dev/v0/daily-stats?created_at=' + this.today + '&location=' + this.location.name + '&with=Sale';
                this.$http.get(url, {api_token: this.location.api_token})
                .then(function(response) {
                    //Success
                    this.totalInvoices = response.data.data.total_invoices;
                    this.itemsSold = response.data.data.items_sold;
                    this.totalSales = response.data.data.total_sales;
                    this.itemsPerInvoice = response.data.data.items_per_invoice;
                    this.salesPerInvoice = response.data.data.sales_per_invoice;
                }, function(response) {
                    //Error
                    if(response.status === 404)
                    {
                        //If it responds with 404, there are no invoices.
                        this.totalInvoices = 0;     
                        this.itemsSold = 0;
                        this.totalSales = 0;
                        this.itemsPerInvoice = 0;
                        this.salesPerInvoice = 0;         
                    }
                });
            },
        },

        events: {
            'new-sale': function() {
                this.calculateDailyStats();
            }
        }
    });

</script>