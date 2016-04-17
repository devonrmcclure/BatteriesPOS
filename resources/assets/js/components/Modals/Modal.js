import Vue from 'vue';

export default Vue.extend({
    template: `
        <div class="Modal__overlay" @click="close" v-show="show" transition="modal">
            <div class="Modal__container" @click.stop>
                <div class="modal-header">
                    <h3>{{ title }}</h3>
                </div>

                <slot></slot>

            </div>
        </div>
    `,

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

