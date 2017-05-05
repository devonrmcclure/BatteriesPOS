<template>
    <modal :show.sync="show" :on-close="close" :title.sync="title">

        <div class="Modal__body">
            <form id="add-staff-form">
                <input type="hidden" name="api_token" value="{{location.api_token}}"/> 
                <div>
                    <input type="text" name="staff-first-name" id="staff-first-name" placeholder="First Name *" v-model="staff.first_name"/>
                    <input type="text" name="staff-last-name" id="staff-last-name" placeholder="Last Name" v-model="staff.last_name"/>
                </div>
                <div>
                    <input type="text" name="staff-repcode" id="staff-repcode" placeholder="Rep Code *" v-model="staff.repcode">
                </div>
                <div>
                    <input type="text" name="staff-address" id="staff-address" placeholder="Address" v-model="staff.address"/> 
                    <input type="text" name="staff-city" id="staff-city" placeholder="City" v-model="staff.city"/>
                    <input type="text" name="staff-province" id="staff-province" placeholder="Province *" v-model="staff.province"/>
                    <input type="text" name="staff-country" id="staff-country" placeholder="Country *" v-model="staff.country"/>
                    <input type="text" name="staff-postal-code" id="staff-postal-code" placeholder="Postal Code" v-model="staff.postal_code"/>
                </div>
                <div>
                    <input type="text" name="staff-primary-phone" id="staff-primary-phone" placeholder="Primary Phone *" v-model="phone"/>
                    <input type="text" name="staff-secondary-phone" id="staff-secondary-phone" placeholder="Secondary Phone" v-model="staff.secondary_phone"/>
                    <input type="text" name="staff-email" id="staff-email" placeholder="Email" v-model="staff.email"/>
                </div>
                <div>
                    <select name="staff-location-id">
                        <option value="1">Head Office</option>
                        <option value="6">Guildford</option>
                        <option value="8">Maple Ridge</option>
                        <option value="2">Richmond</option>
                        <option value="3">White Rock</option>
                    </select>
                </div>
                <input type="submit" @click.capture="addStaff" value="Add"/>
            </form>
            <small class="required-tooltip">* indicates a required field</small>
        </div>

        <div class="Modal__footer">
        </div>
    </modal>
</template>


<script>
    import Moment from 'moment';
    import Modal from '../../Modals/Modal.vue';

    export default Modal.extend({

        props: ['show', 'title', 'location', 'staff', 'phone'],

        components: {Modal},

        data() {
            return {
               
            }
        },

        ready() {
            //Change this to a default for props.
            this.staff = {
                province: 'British Columbia',
                country: 'Canada',
            }
        },

        methods: {
            close() {
                this.show = false;
            },

            addStaff(e) {
                //TODO Validation
                e.preventDefault();
                var formData = new FormData(document.querySelector('#add-staff-form'));
                var url = '/api/v0/admin/staff/add';
                this.$http.post(url, formData)
                .then(function(response) {
                    //Success
                    this.$set('staff', response.data);
                    this.$dispatch('new-staff');
                    this.close();
                }, function(response) {
                    //TODO: Proper flash message
                    var array = $.map(response.data, function(value, index) {
                        return [value];
                    });

                    alert(array.join("\n"));
                });               
            },

        }
    });
</script>
