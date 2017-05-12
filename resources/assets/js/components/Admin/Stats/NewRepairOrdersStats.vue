<template>
    <h3>New Orders <small>POs: {{totalPOs}} | ROs: {{totalROs}}</small></h3>
    <hr />
    <div>
        <canvas id="ro-stats" style="height:150px"></canvas>
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
            guildfordROs: null,
            mapleRidgeROs: null,
            richmondROs: null,
            whiteRockROs: null,
            guildfordPOs: null,
            mapleRidgePOs: null,
            richmondPOs: null,
            whiteRockPOs: null,
            totalROs: 0,
            totalPOs: 0
        }
    },

    ready() {
        this.getGFROs();
        this.getMRROs();
        this.getRMROs();
        this.getWRROs();
        this.getGFPOs();
        this.getMRPOs();
        this.getRMPOs();
        this.getWRPOs();

        setTimeout(function() {
            var context = document.querySelector('#ro-stats').getContext('2d');
            
            var data = {
                labels: this.labels,
                datasets: [
                    {         
                        label: 'Part Orders',    
                        backgroundColor: "rgba(0,0,255,0.4)",
                        data: [Number(this.guildfordROs).toFixed(2), Number(this.mapleRidgeROs).toFixed(2), Number(this.richmondROs).toFixed(2), Number(this.whiteRockROs).toFixed(2)],
                        
                    },

                     {         
                        label: 'Repair Orders',    
                        backgroundColor: "rgba(255,0,0,0.4)",
                        data: [Number(this.guildfordPOs).toFixed(2), Number(this.mapleRidgePOs).toFixed(2), Number(this.richmondPOs).toFixed(2), Number(this.whiteRockPOs).toFixed(2)],
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

            this.render(data, 'line', context, options); 
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
        getGFROs() {
            var url = '/api/v0/repair-orders?created_at=' + this.today + '&location_id=6&limit=all';
            this.$http.get(url, {api_token: this.location.api_token})
            .then(function(response) {
                //Success
                this.guildfordROs = response.data.data.length;
                this.totalROs += response.data.data.length;
            }, function(response) {
                //Error
                if(response.status === 404)
                {
                    this.guildfordROs = 0;    
                }
            });
        },

        getMRROs() {
            var url = '/api/v0/repair-orders?created_at=' + this.today + '&location_id=8&limit=all';
            this.$http.get(url, {api_token: this.location.api_token})
            .then(function(response) {
                //Success
                this.mapleRidgeROs = response.data.data.length;       
                this.totalROs += response.data.data.length;  
            }, function(response) {
                //Error
                if(response.status === 404)
                {
                    this.mapleRidgeROs = 0;        
                }
            });
        },

        getRMROs() {
            var url = '/api/v0/repair-orders?created_at=' + this.today + '&location_id=2&limit=all';
            this.$http.get(url, {api_token: this.location.api_token})
            .then(function(response) {
                //Success
                this.richmondROs = response.data.data.length;
                this.totalROs += response.data.data.length;               
            }, function(response) {
                //Error
                if(response.status === 404)
                {
                    this.richmondROs = 0;   
                }
            });
        },

        getWRROs() {
            var url = '/api/v0/repair-orders?created_at=' + this.today + '&location_id=3&limit=all';
            this.$http.get(url, {api_token: this.location.api_token})
            .then(function(response) {
                //Success          
                this.whiteRockROs = response.data.data.length; 
                this.totalROs += response.data.data.length;            
            }, function(response) {
                //Error
                if(response.status === 404)
                {
                    this.whiteRockROs = 0;       
                }
            });
        },

        getGFPOs() {
            var url = '/api/v0/part-orders?created_at=' + this.today + '&location_id=6&limit=all';
            this.$http.get(url, {api_token: this.location.api_token})
            .then(function(response) {
                //Success
                this.guildfordPOs = response.data.data.length;
                this.totalPOs += response.data.data.length;
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
                this.totalPOs += response.data.data.length; 
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
                this.totalPOs += response.data.data.length;               
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
                this.totalPOs += response.data.data.length;           
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