<template>
    <modal :show.sync="show" :on-close="close" :title.sync="title">
        
        <div class="Modal__body">
            <form>
                <label for="referred-by">Referred By</label>
                <select name="referred-by">
                    <option value=""></option>
                    <option value="Oster">Oster</option>                    
                </select>

            </form>
        </div>

    </modal>
</template>


<script lang="babel">
    import Modal from './Modal.vue';

    export default Modal.extend({

        props: ['show', 'title', 'newRepairOrder'],

        components: {Modal},

        methods: {
             close() {
                this.show = false;
            },
        }

    });
</script>