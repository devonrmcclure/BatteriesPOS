<template>
    <!-- <div class="col-md-9 module-container">
        <div class="module">
            Dashboardddd
        </div>
    </div> -->
    <div class="col-md-3 module-container">
        <div class="module">
            <store-stats 
                :labels="['Guildford', 'Maple Ridge', 'Richmond', 'White Rock']"
                :colors="['#4CAF50', '#303F9F', '#F44336', '#FFEB3B']"
                :location="location"
            ></store-stats>
        </div>
    </div>

    <div class="col-md-3 module-container">
        <div class="module">
            <h3>New Part Orders <small>5 total</small></h3>
            <hr />
            <store-stats 
                :labels="['Guildford', 'Maple Ridge', 'Richmond', 'White Rock']"
                :colors="['#4CAF50', '#303F9F', '#F44336', '#FFEB3B']"
                :location="location"
            ></store-stats>
        </div>
    </div>

    <div class="col-md-3 module-container">
        <div class="module">
            <h3>New Repair Orders</h3>
            <hr />
            <store-stats 
                :labels="['Guildford', 'Maple Ridge', 'Richmond', 'White Rock']"
                :colors="['#4CAF50', '#303F9F', '#F44336', '#FFEB3B']"
                :location="location"
            ></store-stats>
        </div>
    </div>

    <div class="col-md-3 module-container">
        <div class="module">
            <h3>Daily Sales <small>{{today | moment}}</small></h3>
            <hr />
            <store-stats 
                :labels="['Guildford', 'Maple Ridge', 'Richmond', 'White Rock']"
                :colors="['#4CAF50', '#303F9F', '#F44336', '#FFEB3B']"
                :location="location"
            ></store-stats>
        </div>
    </div>

    <div class="col-md-3 module-container">
        <div class="module">
            <h3>Daily Sales <small>{{today | moment}}</small></h3>
            <hr />
            <store-stats 
                :labels="['Guildford', 'Maple Ridge', 'Richmond', 'White Rock']"
                :colors="['#4CAF50', '#303F9F', '#F44336', '#FFEB3B']"
                :location="location"
            ></store-stats>
        </div>
    </div>

    <div class="col-md-3 module-container">
        <div class="module">
            <h3>Daily Sales <small>{{today | moment}}</small></h3>
            <hr />
            <store-stats 
                :labels="['Guildford', 'Maple Ridge', 'Richmond', 'White Rock']"
                :colors="['#4CAF50', '#303F9F', '#F44336', '#FFEB3B']"
                :location="location"
            ></store-stats>
        </div>
    </div>
</template>

<script lang="babel">
import Vue from 'vue';
import Moment from 'moment';
import StoreStats from './Stats/Store.vue'

export default Vue.extend({

    components: {StoreStats},

    props: ['location'],
    
    data() {
        return {
            
        }
    },

    ready() {
        
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
