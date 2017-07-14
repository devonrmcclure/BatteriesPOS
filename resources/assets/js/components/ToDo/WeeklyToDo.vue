<template>
    <div class="col-md-4 module-container">
        <div class="module">
            <h4>Weekly To Do</h4>
            <hr />
            
            <div class="todo-container">
                <p v-for="task in weeklyToDos">
                    <input type="checkbox" id="{{task.task}}" name="{{task.task}}" v-if="task.completed == today || task.complete >= today" checked="checked">
                    <input type="checkbox" id="{{task.task}}" name="{{task.task}}" v-else="">
                    <label for="{{task.task}}">{{task.task | checkCompleted}}</label>
                    <small class="pull-right"><em>{{task.completed | moment}}</em></small>
                </p>
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
            weeklyToDos: [],
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
        this.getWeeklyToDo();
    },

    methods: {
        getWeeklyToDo() {
            var url = '/api/v0/todo?location_id=' + this.location.id + '&task_type=weekly&order_by=task,asc';

            this.$http.get(url, {api_token: this.location.api_token}).then(function(response) {
                this.$set('weeklyToDos', response.data.data);

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