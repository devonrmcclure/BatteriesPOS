<template>

    <form style="text-align: right;">
        <label for="cash">Cash</label>
        <input type="text" placeholder="0.00" v-model="cashInput"><br/>

        <label for="cash">Debit Card</label>
        <input type="text" placeholder="0.00" v-model="interacInput"><br/>

        <label for="cash">Visa</label>
        <input type="text" placeholder="0.00" v-model="visaInput "><br/>

        <label for="cash">Master Card</label>
        <input type="text" placeholder="0.00" v-model="mastercardInput"><br/>

        <label for="cash">Other</label>
        <input type="text" placeholder="0.00" v-model="otherInput"><br/>

        <label for="cash">Total</label>
        <input type="text" placeholder="0.00" v-model="inputTotals" readonly><br/>

        <label for="cash">Proceeds To Deposit</label>
        <input type="text" placeholder="0.00" v-model="totalSales" readonly><br/>

        <label for="cash">DIFFERENCE</label>
        <input type="text" placeholder="0.00" v-model="difference" readonly><br/>

    </form>

    <button type="button" @click="updateStats()">Calculate</button>
</template>


<script lang="babel">

import Vue from 'vue';

export default Vue.extend({
    data() {
        return {
            totalCashSales: [],
            totalInteracSales: [],
            totalVisaSales: [],
            totalMasterCardSales: [],
            totalSales: 0,
            cashInput: '',
            interacInput: '',
            visaInput: '',
            mastercardInput: '',
            otherInput: ''
        }
    },

    components: {},

    props: ['location'],

    ready() {
        this.getTotalCashSales();
        this.getTotalInteracSales();
        this.getTotalMasterCardSales();
        this.getTotalVisaSales();
    },

    computed: {
        today: function() {
            var date = new Date();
            var month = date.getMonth() + 1;
            var day = date.getDate();
            var year = date.getFullYear();

            return year + "-" + month + "-" + day;
        },

        difference: function() {
            return (Number(this.totalSales) - Number(this.inputTotals)).toFixed(2);
        },

        inputTotals: function() {
            return (Number(this.cashInput) + Number(this.interacInput) + Number(this.visaInput) + Number(this.mastercardInput) + Number(this.otherInput)).toFixed(2);
        }
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
                        this.totalSales += response.data.data[i].total;
                }
            }, function(response) {
                //Error
                if(response.status === 404)
                {
                    this.totalCashSales = [];    
                }
            });
        },

        getTotalInteracSales() {
            var url = '/api/v0/invoice?created_at=' + this.today + '&location=' + this.location.name + '&limit=all&payment_method=Interac';
            this.$http.get(url, {api_token: this.location.api_token})
            .then(function(response) {
                //Success
                for(var i = 0; i < response.data.data.length; i++) {
                    
                    var data = {
                        'withTax': response.data.data[i].total,
                        'preTax': (response.data.data[i].total - (response.data.data[i].total_pst + response.data.data[i].total_gst))
                    };
                        this.totalInteracSales.push(data);
                        this.totalSales += response.data.data[i].total;
                }                    
            }, function(response) {
                //Error
                if(response.status === 404)
                {
                    this.totalInteracSales = [];        
                }
            });
        },

        getTotalVisaSales() {
            var url = '/api/v0/invoice?created_at=' + this.today + '&location=' + this.location.name + '&limit=all&payment_method=Visa';
            this.$http.get(url, {api_token: this.location.api_token})
            .then(function(response) {
                //Success
                for(var i = 0; i < response.data.data.length; i++) {
                    
                    var data = {
                        'withTax': response.data.data[i].total,
                        'preTax': (response.data.data[i].total - (response.data.data[i].total_pst + response.data.data[i].total_gst))
                    };
                        this.totalVisaSales.push(data);
                        this.totalSales += response.data.data[i].total;
                }                    
            }, function(response) {
                //Error
                if(response.status === 404)
                {
                    this.totalVisaSales = [];        
                }
            });
        },

        getTotalMasterCardSales() {
            var url = '/api/v0/invoice?created_at=' + this.today + '&location=' + this.location.name + '&limit=all&payment_method=Mastercard';
            this.$http.get(url, {api_token: this.location.api_token})
            .then(function(response) {
                //Success
                for(var i = 0; i < response.data.data.length; i++) {
                    
                    var data = {
                        'withTax': response.data.data[i].total,
                        'preTax': (response.data.data[i].total - (response.data.data[i].total_pst + response.data.data[i].total_gst))
                    };
                        this.totalMasterCardSales.push(data);
                        this.totalSales += response.data.data[i].total;
                }                    
            }, function(response) {
                //Error
                if(response.status === 404)
                {
                    this.totalMasterCardSales = [];        
                }
            });
        },

        updateStats() {
            this.clear();
            this.getTotalCashSales();
            this.getTotalInteracSales();
            this.getTotalMasterCardSales();
            this.getTotalVisaSales();
        },

        clear() {
            this.totalCashSales = [];
            this.totalInteracSales = [];
            this.totalMasterCardSales = [];
            this.totalVisaSales = [];
            this.totalSales = 0;
        }
    }
});

</script>
