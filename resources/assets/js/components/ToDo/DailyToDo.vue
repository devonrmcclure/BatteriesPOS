<template>
    <div class="col-md-4 module-container">
        <div class="module">
            <h4>Daily To Do</h4>
            <hr />
            
            <div class="todo-container">
                <div v-for="task in dailyToDos">
                    <input type="checkbox" id="{{task.task}}" name="{{task.task}}" v-if="task.completed == today || task.complete >= today" checked="checked">
                    <input type="checkbox" id="{{task.task}}" name="{{task.task}}" v-else="">
                    <label for="{{task.task}}">{{task.task | checkCompleted}}</label>
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
            dailyToDos: [],
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
        this.getDailyToDo();
    },

    methods: {
        getDailyToDo() {
            var url = '/api/v0/todo?location_id=' + this.location.id + '&task_type=daily&order_by=task,asc';

            this.$http.get(url, {api_token: this.location.api_token}).then(function(response) {
                this.$set('dailyToDos', response.data.data);

            }, function(response) {
            // error callback
            });
        }
    },

    filters: {
      moment: function (date) {
        if(date !== 'No Previous Sale' && date !== '')
        {
            return Moment(date).format('YYYY-MM-DD @ H:mm');
        }
            return 'No Sales History';
      },

        checkCompleted: function(task) {
            var today = new Date();

            if(task.completed == (today.getFullYear()+'-'+(today.getMonth())+'-'+today.getDate())) {
                this.checked = 'checked';
            } else {
                this.checked = 'unchecked';
            }

            return task;
        }
    }


});

</script>   