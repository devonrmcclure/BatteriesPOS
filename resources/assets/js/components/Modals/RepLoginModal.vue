<template>
    <modal :show.sync="show" :on-close="close" :title.sync="title">

        <div class="Modal__body">
            <span class="error">{{ error }}</span>

            <input type="text" id="rep-login" @keyup.enter="getRep()" v-model="repCode" placeholder="Rep Code">
        </div>
    </modal>

    <new-sale-modal :show.sync="newSale" :products.sync="products" :prices.sync="prices" :customer.sync="customer" title="New Sale" :rep.sync="rep" :location.sync="location" :invoice.sync="invoice"></new-sale-modal>

</template>


<script lang="babel">
    import Modal from './Modal.vue';
    import NewSaleModal from './NewSaleModal.vue';

    export default Modal.extend({

        props: ['show', 'title', 'newSale', 'location', 'customer', 'invoice', 'total', 'products', 'prices'],

        components: {Modal, NewSaleModal},

        data() {
            return {
                repCode: '',
                rep: [],
                error: ''
            }
        },

        ready() {
            document.addEventListener("keydown", (e) => {
                $('#rep-login').focus();
            });
        },

        methods: {
            close() {
                this.show = false;
                this.repCode = '';
                this.error = '';
            },

            getRep() {
                var url = 'http://api.batteriespos.dev/v0/staff?rep_code=' + this.repCode + '&location_id=' + this.location.id;

                this.$http.get(url, {api_token: this.location.api_token}).then(function(response) {
                    this.$set('rep', response.data.data[0]);
                    this.close();
                    this.getInvoice();
                    this.newSale = true;

                }, function(response) {
                    this.$set('error', 'The Rep does not exist!');
                });
            },

            getInvoice() {
                var url = '//api.batteriespos.dev/v0/invoice?location=' + this.location.name;

                this.$http.get(url, {api_token: this.location.api_token})
                .then( function(response) {
                    //Success
                    this.$set('invoice', Number(response.data.data[0].id+1));
                }, function(response) {
                    //Error

                    switch(this.location.name) {
                        case "Head Office":
                            this.invoice = 0;
                            break;
                        case "Richmond":
                            this.invoice = 200000;
                            break;
                        case "White Rock":
                            this.invoice = 300000;
                            break;
                        case "Guildford":
                            this.invoice = 600000;
                            break;
                        case "Nanaimo":
                            this.invoice = 700000;
                            break;
                        case "Maple Ridge":
                            this.invoice = 800000;
                            break;
                        default:
                            //Throw error
                            console.log('ERROR');
                    }
                });
            }
        }
    });
</script>
