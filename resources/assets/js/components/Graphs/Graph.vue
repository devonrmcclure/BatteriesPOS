<template>
    <canvas width="300" height="200" id="graph"></canvas>
</template>

<script>

import Vue from 'vue';
import Chart from 'chart.js';

export default Vue.extend({

    data() {
        return {
            legend: '',
        };
    },

    methods: {
        render(data, type, context, options) {
            new Chart(context, {
                type: type,
                data: data,
                options: options
            }); 
        }
    }

});

</script>