<template>
    <div class="col-md-8 module-container">
        <div class="module stock-transfer-order">
            <div class="order-header">
                <p class="order-status incomplete">Order is incomplete!</p>
                <div class="order-number">
                    <h2>Order WR00HO</h2>
                </div>
                <div class="order-dates">
                    <p><span class="heading">Stock Ordered:</span> 2017-05-08</p>
                    <p><span class="heading">Stock Sent:</span> 2017-05-10</p>
                    <p><span class="heading">Stock Received:</span> </p>
                </div>

            </div>
            <div class="clear-class"></div>
            <hr />
            
            <table>
                <tr>
                    <th>Sku</th>
                    <th>Description</th>
                    <th>Qty Ordered</th>
                    <th>Qty Received</th>
                </tr>

                <tr>
                    <td>483</td>
                    <td>CR2032</td>
                    <td>100</td>
                    <td></td>
                </tr>

                <tr>
                    <td>483</td>
                    <td>CR2032</td>
                    <td>100</td>
                    <td></td>
                </tr>

                <tr>
                    <td>483</td>
                    <td>CR2032</td>
                    <td>100</td>
                    <td></td>
                </tr>

                <tr>
                    <td>483</td>
                    <td>CR2032</td>
                    <td>100</td>
                    <td></td>
                </tr>

            </table>

            
        </div>
    </div>

    <div class="col-md-4 module-container">
        <div class="module">
            
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