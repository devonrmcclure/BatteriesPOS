cd<template>
    <div class="Modal__overlay" @click="close" v-show="show" transition="modal">
        <div class="Modal__container" @click.stop>
            <div class="Modal__header">
                <span class=" Modal--close pull-right" @click="onClose()">&times;</span>
                <h3>{{ title }}</h3>

            </div>
            <hr/>

            <slot></slot>

        </div>
    </div>
</template>


<script lang="babel">

import Vue from 'vue';

export default Vue.extend({
    data() {
        return {
        }
    },

    props: ['show', 'onClose', 'title'],

    methods: {
        close: function () {
            this.onClose();
        }
    },
    ready() {
        document.addEventListener("keydown", (e) => {
            if (this.show && e.keyCode == 27) {
                this.onClose();
            }
        })
    }
});

</script>
