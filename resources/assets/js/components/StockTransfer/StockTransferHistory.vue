<template>
    <div class="col-md-8 module-container">
        <div class="module stock-transfer-history">
            <h2>Order History</h2>
            <hr />
            
            <div class="stock-tabs">
                <button class="orderTab tab tab-active" @click="showTab('orders');">Orders</button><button class="requestTab tab" @click="showTab('requests');">Requests</button>
            </div>


            <div class="stock-order-history">
                <div class="order">
                    <p class="order-number">Order WR01HO</p>
                    <p class="order-date">2017-05-06</p>
                    <p class="view-more"><a href="#"><i class="material-icons md-24 md-black"> launch</i></a></p>
                    <p class="order-status"><i class="material-icons md-24 red500">warning </i></p>
                </div>

                <div class="order completed">
                    <p class="order-number">Order WR00HO</p>
                    <p class="order-date">2017-05-01</p>
                    <p class="view-more"><a href="#"><i class="material-icons md-24 md-black"> launch</i></a></p>
                    <p class="order-status"><i class="material-icons md-24 green700">check_circle </i></p>
                </div>

                <div class="order completed">
                    <p class="order-number">Order WR00HO</p>
                    <p class="order-date">2017-01-01</p>
                    <p class="view-more"><a href="#"><i class="material-icons md-24 md-black"> launch</i></a></p>
                    <p class="order-status"><i class="material-icons md-24 green700">check_circle </i></p>
                </div>
            </div>

            <div class="stock-request-history hidden">
                <div class="order">
                    <p class="order-number">Order RM05WR</p>
                    <p class="order-date">2017-05-06</p>
                    <p class="view-more"><a href="#"><i class="material-icons md-24 md-black"> launch</i></a></p>
                    <p class="order-status"><i class="material-icons md-24 red500">warning </i></p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 module-container">
        <div class="module">
            <p class="new-order"><button>new order</button></p>
        </div>
    </div>
</template>

<script>
import Vue from 'vue';
import Moment from 'moment';

export default Vue.extend({

    props: {
        location: {},
        labels: {},
        colors: {
            default: 'grey',
        }
    },

    data() {
        return {
            
        }
    },

    ready() {
             
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

        showTab(type) {
            if(type == 'orders')
            {
                $('.stock-order-history').show();
                $('.orderTab').addClass('tab-active');
                $('.stock-request-history').hide();
                $('.requestTab').removeClass('tab-active');
            } else {
                $('.stock-order-history').hide();
                $('.orderTab').removeClass('tab-active');
                $('.stock-request-history').show();
                $('.stock-request-history').removeClass('hidden');
                $('.requestTab').addClass('tab-active');
            }
        }
    }
});

</script>