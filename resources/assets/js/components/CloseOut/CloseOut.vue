<template>
    {{totalCashSales[0].preTax}}

    <button type="button" @click="getTotalCashSales()">gfd</button>
    grteghrtesg
</template>


<script lang="babel">

import Vue from 'vue';

export default Vue.extend({
    data() {
        return {
            totalCashSales: [],
        }
    },

    components: {},

    props: ['location'],

    ready() {
        this.getTotalCashSales()
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
        getTotalCashSales() {
            var url = '/api/v0/invoice?created_at=' + this.today + '&location=' + this.location.name + '&limit=all&payment_method=Cash';
            this.$http.get(url, {api_token: this.location.api_token})
            .then(function(response) {
                //Success
                for(var i = 0; i < response.data.data.length; i++) {
                    
                    var data = {
                        'withTax': response.data.data[i].total,
                        'preTax': (response.data.data[i].total - (response.data.data[i].total_pst + response.data.data[i].total_gst))
                    };
                        this.totalCashSales.push(data);
                }

                console.log('whyyyyyyyyyyyyy');
                    
            }, function(response) {
                //Error
                if(response.status === 404)
                {
                    this.totalCashSales = 5;        
                }
            });
        }
    }
});

</script>
