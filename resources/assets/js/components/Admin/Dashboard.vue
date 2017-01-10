<template>
    <h1>Hi there!</h1>
</template>

<script lang="babel">
import Vue from 'vue';
import Moment from 'moment';

export default Vue.extend({

    components: {},

    props: ['location'],
    
    data() {
        return {
            
        }
    },

    ready() {
        this.getCustomers();
    },

    methods: {
        
    },

    filters: {
        moment: function (date) {
            return Moment(date).format('MMMM Do YYYY');
        }
    }
});

</script>
