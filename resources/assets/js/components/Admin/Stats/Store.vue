<template>
    <h3>Daily Sales <small>{{Number(total).toFixed(2)}}</small></h3>
    <hr />
    <div>
        <canvas id="store-sales" style="height:150px"></canvas>
    </div>
</template>

<script>
import Graph from '../../Graphs/Graph.vue';

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
            guildfordSales: null,
            mapleRidgeSales: null,
            richmondSales: null,
            whiteRockSales: null,
        }
    },

    ready() {
        this.getGFSales();
        this.getMRSales();
        this.getRMSales();
        this.getWRSales();

        setTimeout(function() {
            var context = document.querySelector('#store-sales').getContext('2d');
            
            var data = {
                labels: this.labels,
                datasets: [
                    {         
                        label: 'Total (w/ Tax)',    
                        data: [Number(this.guildfordSales).toFixed(2), Number(this.mapleRidgeSales).toFixed(2), Number(this.richmondSales).toFixed(2), Number(this.whiteRockSales).toFixed(2)],
                        backgroundColor: this.colors
                    }
                ],
            }

            var options = {
                legend: {
                    display: false,
                },

                maintainAspectRatio: false,
                responsive: true
            }

            this.render(data, 'bar', context, options); 
        }.bind(this), 500);
       
    },

    computed: {
        today: function() {
            var date = new Date();
            var month = date.getMonth() + 1;
            var day = date.getDate();
            var year = date.getFullYear();

            var dateString = year + '-' + (('0' + month).slice(-2)) + '-' + (('0' + day).slice(-2))

            return dateString;
        }
    },

    methods: {
        getGFSales() {
            var url = '/api/v0/invoice?created_at=' + this.today + '&location=Guildford&limit=all';
            this.$http.get(url, {api_token: this.location.api_token})
            .then(function(response) {
                //Success
                for(var i = 0; i < response.data.data.length; i++) {
                    this.guildfordSales += response.data.data[i].total;
                }
            }, function(response) {
                //Error
                if(response.status === 404)
                {
                    this.guildfordSales = 0;    
                }
            });
        },

        getMRSales() {
            var url = '/api/v0/invoice?created_at=' + this.today + '&location=Maple Ridge&limit=all';
            this.$http.get(url, {api_token: this.location.api_token})
            .then(function(response) {
                //Success
                for(var i = 0; i < response.data.data.length; i++) {
                    this.mapleRidgeSales += response.data.data[i].total;
                }                    
            }, function(response) {
                //Error
                if(response.status === 404)
                {
                    this.mapleRidgeSales = 0;        
                }
            });
        },

        getRMSales() {
            var url = '/api/v0/invoice?created_at=' + this.today + '&location=Richmond&limit=all';
            this.$http.get(url, {api_token: this.location.api_token})
            .then(function(response) {
                //Success
                for(var i = 0; i < response.data.data.length; i++) {
                    this.richmondSales += response.data.data[i].total;
                }                    
            }, function(response) {
                //Error
                if(response.status === 404)
                {
                    this.richmondSales = 0;   
                }
            });
        },

        getWRSales() {
            var url = '/api/v0/invoice?created_at=' + this.today + '&location=White Rock&limit=all';
            this.$http.get(url, {api_token: this.location.api_token})
            .then(function(response) {
                //Success
                for(var i = 0; i < response.data.data.length; i++) {            
                   this.whiteRockSales += response.data.data[i].total;
                }                    
            }, function(response) {
                //Error
                if(response.status === 404)
                {
                    this.whiteRockSales = 0;       
                }
            });
        }
    }
});

</script>