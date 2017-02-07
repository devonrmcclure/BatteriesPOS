<template>
    <div style="width: 300px; height: 200px; float: left;">
        <canvas id="graph"></canvas>
    </div>
</template>

<script>
import Graph from './Graph.vue';

export default Graph.extend({

    props: {
        location: {},
        labels: {},
        colors: {
            default: 'grey',
        }
    },

    data() {
        return {
            cash: null,
            interac: null,
            visa: null,
            mastercard: null,
            other: null
        }
    },

    ready() {
        this.getTotalCashSales();
        this.getTotalInteracSales();
        this.getTotalVisaSales();
        this.getTotalMasterCardSales();
        this.getTotalOtherSales();

        setTimeout(function() {

            
            var data = {
                labels: this.labels,
                datasets: [
                    {             
                        data: [this.cash, this.interac, this.visa, this.mastercard, this.other],
                        backgroundColor: this.colors
                    }
                ]
            }

            this.render(data, 'doughnut'); 
        }.bind(this), 500);
       
    },

    computed: {
        today: function() {
            var date = new Date();
            var month = date.getMonth() + 1;
            var day = date.getDate();
            var year = date.getFullYear();

            return year + "-" + month + "-" + day;
        }
    },

    methods: {
        getTotalCashSales() {
            var url = '/api/v0/invoice?created_at=' + this.today + '&location=' + this.location.name + '&limit=all&payment_method=Cash';
            this.$http.get(url, {api_token: this.location.api_token})
            .then(function(response) {
                //Success
                for(var i = 0; i < response.data.data.length; i++) {
                    this.cash += response.data.data[i].total;
                }
            }, function(response) {
                //Error
                if(response.status === 404)
                {
                    this.cash = 0;    
                }
            });
        },

        getTotalInteracSales() {
            var url = '/api/v0/invoice?created_at=' + this.today + '&location=' + this.location.name + '&limit=all&payment_method=Interac';
            this.$http.get(url, {api_token: this.location.api_token})
            .then(function(response) {
                //Success
                for(var i = 0; i < response.data.data.length; i++) {
                    this.interac += response.data.data[i].total;
                }                    
            }, function(response) {
                //Error
                if(response.status === 404)
                {
                    this.interac = 0;        
                }
            });
        },

        getTotalVisaSales() {
            var url = '/api/v0/invoice?created_at=' + this.today + '&location=' + this.location.name + '&limit=all&payment_method=Visa';
            this.$http.get(url, {api_token: this.location.api_token})
            .then(function(response) {
                //Success
                for(var i = 0; i < response.data.data.length; i++) {
                    this.visa += response.data.data[i].total;
                }                    
            }, function(response) {
                //Error
                if(response.status === 404)
                {
                    this.visa = 0;   
                }
            });
        },

        getTotalMasterCardSales() {
            var url = '/api/v0/invoice?created_at=' + this.today + '&location=' + this.location.name + '&limit=all&payment_method=Mastercard';
            this.$http.get(url, {api_token: this.location.api_token})
            .then(function(response) {
                //Success
                for(var i = 0; i < response.data.data.length; i++) {            
                   this.mastercard += response.data.data[i].total;
                }                    
            }, function(response) {
                //Error
                if(response.status === 404)
                {
                    this.mastercard = 0;       
                }
            });
        },

        getTotalOtherSales() {
            var url = '/api/v0/invoice?created_at=' + this.today + '&location=' + this.location.name + '&limit=all&payment_method=Other';
            this.$http.get(url, {api_token: this.location.api_token})
            .then(function(response) {
                //Success
                for(var i = 0; i < response.data.data.length; i++) {
                    this.other += response.data.data[i].total;
                }                    
            }, function(response) {
                //Error
                if(response.status === 404)
                {
                    this.other = 0;        
                }
            });
        }
    }
});

</script>