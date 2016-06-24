<template>
    <modal :show.sync="show" :on-close="close" :title.sync="title">
        <new-sale-form :show.sync="show" :location="location" :customer.sync="customer" :invoice.sync="invoice" :rep.sync="rep"></new-sale-form>

        <div class="Modal__footer">
            
        </div>
    </modal>
    
    <receipt-modal :show.sync="showReceipt" title="Print Receipt?" :print.sync="print"></receipt-modal>
</template>


<script>
    import Modal from './Modal.vue';
    import ReceiptModal from './ReceiptModal.vue';
    import NewSaleForm from '../Sales/NewSaleForm.vue';

    export default Modal.extend({

        props: ['show', 'title', 'rep', 'location', 'invoice', 'showReceipt', 'customer'],

        components: {Modal, NewSaleForm, ReceiptModal},

        data() {
            return {
                
            }
        },

        ready() {
            //this.getCustomer();
            // TODO: Get value of PST and GST from a "settings" table
        },

        methods: {
            close() {
                this.clearData();
                this.show = false;

            },

            clearData() {
                this.products = [];
                this.prices = [];
                this.sku = '';
                this.quantity = '';
            },

        }
    });
</script>
