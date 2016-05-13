<template>
<modal :show.sync="show" :on-close="close" :title.sync="title">

    <div class="Modal__body">
        <form method="POST" action="http://api.batteriespos.dev/v0/part-orders?api_token=token" v-ajax>
            <label for="referred-by">Referred By</label>
            <select name="referred-by" id="referred_by">
                <option value=""></option>
                <option value="Oster">Oster</option>
            </select>

            <label for="make">Make</label>
            <input name="make" id="make" type="text"/>

            <label for="item">Item</label>
            <input type="text" name="item" id="item">

            <label for="model">Model</label>
            <input name="model" id="model" type="text"/>

            <label for="staff">Staff</label>
            <input name="staff" id="staff" type="text"/>

            <label for="sku">Sku</label>
            <input name="sku" id="sku" type="text"/>

            <label for="description">Description</label>
            <input name="description" id="description" type="text"/>

            <label for="part-number">Part Number</label>
            <input name="part-number" id="part-number" type="text"/>

            <label for="deposit">Deposit</label>
            <input name="deposit" id="deposit" type="text"/>


            <label for="pick-up-location">Pick Up Location</label>
            <input name="pick-up-location" id="pick-up-location" type="text"/>

            <label for="notes">Notes</label>
            <textarea name="notes" id="notes" ></textarea>

            <input type="submit" value="Submit" />
        </form>
    </div>

</modal>
</template>


<script lang="babel">
import Modal from './Modal.vue';

export default Modal.extend({

    props: ['show', 'title', 'newPartOrder'],

    components: {Modal},

    methods: {
         close() {
            this.show = false;
        },
    }

});
</script>
