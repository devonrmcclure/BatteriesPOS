<template>
    <h3>New POs <small>{{total}}</small></h3>
    <hr />
    <div>
        <canvas id="po-stats" style="height:150px"></canvas>
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
            guildfordPOs: null,
            mapleRidgePOs: null,
            richmondPOs: null,
            whiteRockPOs: null,
            total: 0
        }
    },

    ready() {
        this.getGFPOs();
        this.getMRPOs();
        this.getRMPOs();
        this.getWRPOs();

        setTimeout(function() {
            var context = document.querySelector('#po-stats').getContext('2d');
            
            var data = {
                labels: this.labels,
                datasets: [
                    {         
                        label: 'Total (w/ Tax)',    
                        data: [Number(this.guildfordPOs).toFixed(2), Number(this.mapleRidgePOs).toFixed(2), Number(this.richmondPOs).toFixed(2), Number(this.whiteRockPOs).toFixed(2)],
                        backgroundColor: this.colors
                    }
                ],
            }

            var options = {
                legend: {
                    display: true,
                },

                maintainAspectRatio: false,
                responsive: true
            }

            this.render(data, 'pie', context, options); 
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
        getGFPOs() {
            var url = '/api/v0/part-orders?created_at=' + this.today + '&location_id=6&limit=all';
            this.$http.get(url, {api_token: this.location.api_token})
            .then(function(response) {
                //Success
                this.guildfordPOs = response.data.data.length;
                this.total += response.data.data.length;
            }, function(response) {
                //Error
                if(response.status === 404)
                {
                    this.guildfordPOs = 0;    
                }
            });
        },

        getMRPOs() {
            var url = '/api/v0/part-orders?created_at=' + this.today + '&location_id=8&limit=all';
            this.$http.get(url, {api_token: this.location.api_token})
            .then(function(response) {
                //Success
                this.mapleRidgePOs = response.data.data.length;       
                this.total += response.data.data.length;   
            }, function(response) {
                //Error
                if(response.status === 404)
                {
                    this.mapleRidgePOs = 0;        
                }
            });
        },

        getRMPOs() {
            var url = '/api/v0/part-orders?created_at=' + this.today + '&location_id=2&limit=all';
            this.$http.get(url, {api_token: this.location.api_token})
            .then(function(response) {
                //Success
                this.richmondPOs = response.data.data.length;
                this.total += response.data.data.length;               
            }, function(response) {
                //Error
                if(response.status === 404)
                {
                    this.richmondPOs = 0;   
                }
            });
        },

        getWRPOs() {
            var url = '/api/v0/part-orders?created_at=' + this.today + '&location_id=3&limit=all';
            this.$http.get(url, {api_token: this.location.api_token})
            .then(function(response) {
                //Success          
                this.whiteRockPOs = response.data.data.length; 
                this.total += response.data.data.length;            
            }, function(response) {
                //Error
                if(response.status === 404)
                {
                    this.whiteRockPOs = 0;       
                }
            });
        }
    }
});

</script>