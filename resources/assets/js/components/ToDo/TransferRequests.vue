<template>
    <div class="col-md-5 module-container">
        <div class="module">
            <h4>Transfer Requests</h4>
            <hr />
            
            <div class="todo-container">
                <div class="stock-request-history">
                    <div class="order" v-for='request in requests'>

                        <!-- completed order -->
                        <div v-if="request.status == 'Completed'" class="status-{{request.status}}">
                            <p class="order-number">Order {{request.order_number}}</p>
                            <p class="order-date">{{request.updated_at | moment}}</p>
                            <p class="view-more"><a href="/inventory/request/{{request.order_number}}"><i class="material-icons md-24 md-black"> launch</i></a></p>

                            <p class="order-status"><i class="material-icons md-24 green700">done </i></p>
                        </div>
                        
                        <!-- incomplete order -->
                        <div v-else class="status-{{request.status}}">
                            <p class="order-number">Order {{request.order_number}}</p>
                            <p class="order-date">{{request.created_at | moment}}</p>
                            <p class="view-more"><a href="/inventory/request/{{request.order_number}}"><i class="material-icons md-24 md-black"> launch</i></a></p>
                            <p class="order-status"><i class="material-icons md-24 md-icon-{{request.status}}">info_outline </i></p>
                        </div>
                    </div>               
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Vue from 'vue';
import Moment from 'moment';

export default Vue.extend({

    props: ['location'],

    data() {
        return {
            requests: [],
            checked: ''    
        }
    },

    computed: {
        today: function() {
            var date = new Date();
            var month = date.getMonth() + 1;
            var day = date.getDate();
            var year = date.getFullYear();

            var dateString = year + '-' + (('0' + month).slice(-2)) + '-' + (('0' + day).slice(-2)) + ' 00:00:00';

            return dateString;
        }
    },

    ready() {
        this.getStockRequests();
    },

    methods: {
        getStockRequests() {
            var url = '/api/v0/stock-order?order_by=created_at,desc&requesting_from_location=' + this.location.id + '&except=status,!=,Unordered&limit=5';
            this.$http.get(url, {api_token: this.location.api_token})
            .then(function(response) {
                //Success
                this.requests = response.data.data;
            }, function(response) {
                //Error
                if(response.status === 404)
                {
                    this.requests = [];   
                }
            });
        },

        updateCompleted(index) {
            console.log(this.weeklyToDos[index].id);

            var url = '/api/v0/update-todo';

            this.$http.post(url, {api_token: this.location.api_token, id: this.weeklyToDos[index].id}).then(function(response) {

                this.getWeeklyToDo();

            }, function(response) {
            // error callback
            });
        }
    },

    filters: {
      moment: function(date) {
        if(date !== '0000-00-00 00:00:00' && date !== '')
        {
            return Moment(date).fromNow();
        }
            return 'Never';
      },

        checkCompleted: function(task) {
            var today = new Date();

            if(task.completed == (today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate())) {
                this.checked = 'checked';
            } else {
                this.checked = 'unchecked';
            }

            return task;
        }
    }


});

</script>   