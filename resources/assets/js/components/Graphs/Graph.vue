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
        render(data, type, options) {
            var context = document.querySelector('#graph').getContext('2d');
            new Chart(context, {
                type: type,
                data: data,
                options: options
            }); 
        }
    }

});

</script>