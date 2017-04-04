<template>
    <!-- <sale-type-stats 
        :labels="['Cash', 'Interac', 'Visa', 'MasterCard', 'Other']" 
        :colors="['#4CAF50', '#303F9F', '#F44336', '#FFEB3B', '#9C27B0']"
        :location="location"
    ></sale-type-stats> -->
    <form id="close-out-form">
        <input  type="hidden" name="api_token" value="{{location.api_token}}" readonly/> 
        <label for="cash">Cash</label>
        <input name="cash" id="cash" type="text" placeholder="0.00" v-model="cashInputDisplay" @blur="formatCurrency('cashInput')" @focus="unformatCurrency('cashInput')"><br/>

        <label for="interac">Debit Card</label>
        <input name="interac" id="interac" type="text" placeholder="0.00" v-model="interacInputDisplay" @blur="formatCurrency('interacInput')" @focus="unformatCurrency('interacInput')"><br/>

        <label for="visa">Visa</label>
        <input name="visa" id="visa" type="text" placeholder="0.00" v-model="visaInputDisplay" @blur="formatCurrency('visaInput')" @focus="unformatCurrency('visaInput')"><br/>

        <label for="mastercard">Master Card</label>
        <input name="mastercard" id="mastercard" type="text" placeholder="0.00" v-model="mastercardInputDisplay" @blur="formatCurrency('mastercardInput')" @focus="unformatCurrency('mastercardInput')"><br/>

        <label for="other">Other</label>
        <input name="other" id="other" type="text" placeholder="0.00" v-model="otherInputDisplay" @blur="formatCurrency('otherInput')" @focus="unformatCurrency('otherInput')"><br/>
        

       
        <label for="cash">Total</label>
        <input name="total" type="text" placeholder="0.00" v-model="inputTotals" readonly><br/>

        <label for="cash">Proceeds To Deposit</label>
        <input type="text" placeholder="0.00" v-model="totalSales.toFixed(2)" readonly><br/>

        <label for="cash">DIFFERENCE</label>
        <input type="text" placeholder="0.00" v-model="difference" readonly><br/>
    </form>
    <div class="clear-class"></div>
    <button type="button" @click="updateStats()">Calculate</button>
    <button name="close-out" value="Close Out" @click="closeOut()">Close Out</button>

    <daily-sales-stats title="Daily Sales Stats" :location="location"></daily-sales-stats>

    
</template>


<script lang="babel">

import Vue from 'vue';
import SaleTypeStats from '../Graphs/SaleTypeStats.vue';
import DailySalesStats from '../Stats/DailySalesStats.vue';

export default Vue.extend({
    data() {
        return {
            totalCashSales: [],
            totalInteracSales: [],
            totalVisaSales: [],
            totalMasterCardSales: [],
            totalSales: 0,
            cashInput: null,
            cashInputDisplay: 0.00,
            interacInput: null,
            interacInputDisplay: 0.00,
            visaInput: null,
            visaInputDisplay: 0.00,
            mastercardInput: null,
            mastercardInputDisplay: 0.00,
            otherInput: null,
            otherInputDisplay: 0.00
        }
    },

    components: {SaleTypeStats, DailySalesStats},

    props: ['location'],

    ready() {
        this.getTotalCashSales();
        this.getTotalInteracSales();
        this.getTotalMasterCardSales();
        this.getTotalVisaSales();
        this.getTotalOtherSales();
        Vue.nextTick(function () {
            this.checkAlreadyClosed(); 
        }.bind(this));
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

        getTotalOtherSales() {
            var url = '/api/v0/invoice?created_at=' + this.today + '&location=' + this.location.name + '&limit=all&payment_method=Other';
            this.$http.get(url, {api_token: this.location.api_token})
            .then(function(response) {
                //Success
                for(var i = 0; i < response.data.data.length; i++) {
                    
                    var data = {
                        'withTax': response.data.data[i].total,
                        'preTax': (response.data.data[i].total - (response.data.data[i].total_pst + response.data.data[i].total_gst))
                    };
                        this.totalOtherSales.push(data);
                        this.totalSales += response.data.data[i].total;
                }                    
            }, function(response) {
                //Error
                if(response.status === 404)
                {
                    this.totalOtherSales = [];        
                }
            });
        },

        updateStats() {
            this.clear();
            this.getTotalCashSales();
            this.getTotalInteracSales();
            this.getTotalMasterCardSales();
            this.getTotalVisaSales();
            this.getTotalOtherSales();
        },

        formatCurrency(input) {
            switch(input) {
                case 'cashInput':
                    this.cashInput = Number(this.cashInputDisplay).toFixed(2);
                    this.cashInputDisplay = "$ " + this.cashInput.replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1,");
                    break;

                case 'interacInput':
                    this.interacInput = Number(this.interacInputDisplay).toFixed(2);
                    this.interacInputDisplay = "$ " + this.interacInput.replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1,");
                    break;

                case 'visaInput':
                    this.visaInput = Number(this.visaInputDisplay).toFixed(2);
                    this.visaInputDisplay = "$ " + this.visaInput.replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1,");
                    break;

                case 'mastercardInput':
                    this.mastercardInput = Number(this.mastercardInputDisplay).toFixed(2);
                    this.mastercardInputDisplay = "$ " + this.mastercardInput.replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1,");
                    break;

                case 'otherInput':
                    this.otherInput = Number(this.otherInputDisplay).toFixed(2);
                    this.otherInputDisplay = "$ " + this.otherInput.replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1,");
                    break;
            }
        },

        unformatCurrency(input) {
            switch(input) {
                case 'cashInput':
                    this.cashInputDisplay = this.cashInput;
                    break;

                case 'interacInput':
                    this.interacInputDisplay = this.interacInput;
                    break;

                case 'visaInput':
                    this.visaInputDisplay = this.visaInput;
                    break;

                case 'mastercardInput':
                    this.mastercardInputDisplay = this.mastercardInput;
                    break;

                case 'otherInput':
                    this.otherInputDisplay = this.otherInput;
                    break;
            }
        },

        clear() {
            this.totalCashSales = [];
            this.totalInteracSales = [];
            this.totalMasterCardSales = [];
            this.totalVisaSales = [];
            this.totalSales = 0;
        },

        checkAlreadyClosed() {
            var url = '/api/v0/close-out';
            this.$http.get(url, {api_token: this.location.api_token})
            .then(function(response) {
                this.cashInputDisplay = '$ ' + response.data.data.cash;
                this.cashInput = response.data.data.cash;

                this.interacInputDisplay = '$ ' + response.data.data.interac;
                this.interacInput = response.data.data.interac;

                this.visaInputDisplay = '$ ' + response.data.data.visa;
                this.visaInput = response.data.data.visa;

                this.mastercardInputDisplay = '$ ' + response.data.data.mastercard;
                this.mastercardInput = response.data.data.mastercard;

                this.otherInputDisplay = '$ ' + response.data.data.other;
                this.otherInput = response.data.data.other;

                this.total = response.data.data.total;
            }, function(response) {
                //TODO: Proper flash message
            });     
        },

        closeOut() {

                var formData = new FormData(document.querySelector('#close-out-form'));

                var data = {
                    cash: this.cashInput,
                    interac: this.visaInput,
                    total: this.total,
                    api_token: this.location.api_token
                }
                var url = '/api/v0/close-out';
                this.$http.post(url, formData)
                .then(function(response) {
                    //Success
                }, function(response) {
                    //TODO: Proper flash message
                });               
            },
    }
});

</script>
