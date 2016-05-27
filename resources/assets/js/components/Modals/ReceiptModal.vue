<template>
    <modal :show.sync="show" :on-close="close" :title.sync="title">

        <div class="Modal__body">
           Does the customer want the receipt?
        </div>

        <div class="Modal__footer">
                <p class=""><span @click="printInvoice(true)">YES</span> | <span @click="printInvoice(false)">NO</span></p>
        </div>
    </modal>

</template>


<script>
    import Modal from './Modal.vue';

    export default Modal.extend({

        props: ['show', 'title', 'print'],

        components: {Modal},

        data() {
            return {
            }
        },

        methods: {
            close() {
                this.show = false;
            },

            printInvoice(print) {
                this.print = print;
                this.close();
            }
        },
    });
</script>
