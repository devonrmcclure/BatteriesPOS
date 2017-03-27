<template>
    <modal :show.sync="show" :on-close="close" :title.sync="title">

        <div class="Modal__body">
            <p>Does the customer want the receipt?</p>

            <a href="/print/sales/{{invoice}}?print=true" target="_blank"><button @click="close()">YES</button></a>
            <button @click="close()">No</button>
        </div>
    </modal>

</template>


<script>
    import Modal from './Modal.vue';

    export default Modal.extend({

        props: ['show', 'title', 'print', 'invoice'],

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
