<template>
    <modal :show.sync="show" :on-close="close" :title.sync="title">

        <div class="Modal__body">
           Does the customer want the receipt?
        </div>

        <div class="Modal__footer">
            Footer
        </div>
    </modal>

</template>


<script>
    import Modal from './Modal.vue';

    export default Modal.extend({

        props: ['show', 'title'],

        components: {Modal},

        data() {
            return {
                
            }
        },

        methods: {
            close() {
                this.show = false;
            },
        },
    });
</script>
