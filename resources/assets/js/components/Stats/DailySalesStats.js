import Vue from 'vue';

export default Vue.extend({
    template: `
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
                    <td>{{totalSales | currency}}</td>
                    <td>{{itemsPerInvoice}}</td>
                    <td>{{salesPerInvoice | currency}}</td>
                </tr>
            </table>
        </div>
    `,

    props: ['title', 'location'],

    ready() {
       this.getTotalInvoices();
    },

    data() {
        return {
            totalInvoices: '',
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


        totalSales: function() {

        },

        itemsSold: function() {

        },

        itemsPerInvoice: function() {

        },

        salesPerInvoice: function() {

        }

    },

    methods: {
        calculateDailyStats() {
            this.getTotalInvoices();
        },

        getTotalInvoices() {
            var url = '//api.batteriespos.dev/v0/invoice?created_at=' + this.today + '&location=' + this.location.name;
            this.$http.get(url, {api_token: this.location.api_token})
            .then(function(response) {
                //Success
                this.totalInvoices = response.data.data.length;
            }, function(response) {
                //Error
                if(response.status === 404)
                {
                    //If it responds with 404, there are no invoices.
                    this.totalInvoices = 0;              
                }
            });
        }
    },

    events: {
        'new-sale': function() {
            this.calculateDailyStats();
        }
    }
});

