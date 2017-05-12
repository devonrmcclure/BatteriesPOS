<template>
    <!-- <div class="col-md-9 module-container">
        <div class="module">
            Dashboardddd
        </div>
    </div> -->
    <div class="col-md-4 module-container">
        <div class="module">
            <store-stats 
                :labels="['Guildford', 'Maple Ridge', 'Richmond', 'White Rock']"
                :colors="['#4CAF50', '#303F9F', '#F44336', '#FFEB3B']"
                :location="location"
            ></store-stats>
        </div>
    </div>

    <div class="col-md-5 module-container">
        <div class="module">
            <new-repair-orders-stats 
                :labels="['Guildford', 'Maple Ridge', 'Richmond', 'White Rock']"
                :colors="['#4CAF50', '#303F9F', '#F44336', '#FFEB3B']"
                :location="location"
            ></new-repair-orders-stats>
        </div>
    </div>
</template>

<script lang="babel">
import Vue from 'vue';
import Moment from 'moment';
import StoreStats from './Stats/Store.vue';
import NewRepairOrdersStats from './Stats/NewRepairOrdersStats.vue';
import NewPartOrdersStats from './Stats/NewPartOrdersStats.vue';

export default Vue.extend({

    components: {StoreStats, NewRepairOrdersStats, NewPartOrdersStats},

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
