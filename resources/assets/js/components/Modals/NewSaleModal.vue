<template>
    <modal :show.sync="show" :on-close="close" :title.sync="title">
        <customer :customer.sync="customer" :location.sync="location"></customer>
    
        <div class="Modal__body">
            <new-sale-form :price.sync="prices" :product.sync="products" :show.sync="show" :location="location" :customer.sync="customer" :invoice.sync="invoice" :rep.sync="rep"></new-sale-form>
        </div>

        <div class="Modal__footer">
            
        </div>
    </modal>
    
    <receipt-modal :show.sync="showReceipt" title="Print Receipt?" :print.sync="print"></receipt-modal>
</template>


<script>
    import Modal from './Modal.vue';
    import ReceiptModal from './ReceiptModal.vue';
    import NewSaleForm from '../Sales/NewSaleForm.vue';
    import Customer from '../Customer/Customer.vue';

    export default Modal.extend({

        props: ['show', 'title', 'rep', 'location', 'invoice', 'showReceipt', 'customer', 'products', 'prices'],

        components: {Modal, Customer, NewSaleForm, ReceiptModal},

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
