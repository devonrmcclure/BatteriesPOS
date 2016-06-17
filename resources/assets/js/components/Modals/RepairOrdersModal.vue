	<template>
    <modal :show.sync="show" :on-close="close" :title.sync="title">

        <div class="Modal__body">

            <form method="POST" action="/repair-orders">
                <input type="hidden" name="api_token" value="{{location.api_token}}"/> 
                <customer :customer.sync="customer" :location.sync="location"></customer>
                <label for="referred-by">Referred By</label>
                <select name="referred-by" id="referred_by">
                    <option value=""></option>
                    <option value="Oster">Oster</option>
                </select>

                <label for="call-if-over">Call if Over</label>
                <input name="call-if-over" id="call-if-over" type="text"/>

                <label for="original-receipt">Original Receipt</label>
                <input type="checkbox" name="original-receipt" id="original-receipt">

                <label for="deposit">Deposit</label>
                <input name="deposit" id="deposit" type="text"/>

                <label for="staff">Staff</label>
                <input name="staff" id="staff" type="text"/>

                <label for="product">Product</label>
                <input name="product" id="product" type="text"/>

                <label for="model">Model</label>
                <input name="model" id="model" type="text"/>

                <label for="type">Type</label>
                <input name="type" id="type" type="text"/>

                <label for="date-code">Date Code</label>
                <input name="date-code" id="date-code" type="text"/>

                <label for="condition">Condition</label>
                <input name="condition" id="condition" type="text"/>

                <label for="accessories">Accessories</label>
                <input name="accessories" id="accessories" type="text"/>

                <label for="problem">Problem</label>
                <textarea name="problem" id="problem" ></textarea>

                <input type="submit" value="Submit" />
            </form>
        </div>

    </modal>
</template>


<script lang="babel">
    import Modal from './Modal.vue';
    import Customer from '../Customer/Customer.vue';

    export default Modal.extend({

        props: ['show', 'title', 'newRepairOrder', 'location'],

        components: {Modal, Customer},

        data() {
            return {
                customer: []
            }
        },

        methods: {
             close() {
                this.show = false;
            },
        }

    });
</script>
