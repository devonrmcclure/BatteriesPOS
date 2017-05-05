 <template>
    <new-staff-modal :show.sync="showNewStaffModal" :staff.sync="staff" title="New Staff" :location="location" :phone="phoneNumber"></new-staff-modal>

    <div class="col-md-9 module-container">
        <div class="module">
            Potentially show how much someone has sold in a day?
        </div>
        
    </div>


    <div class="col-md-3 module-container">
        <div class="module">
            <button @click="showNewStaffModal=true">new staff</button>
        </div>
        
    </div>
    
</template>


<script lang="babel">

import Vue from 'vue';
import NewStaffModal from './NewStaffModal.vue';

export default Vue.extend({
    data() {
        return {
            phoneNumber: '',
            error: '',
            showNewStaffModal: false,
        }
    },

    components: {NewStaffModal},

    props: ['staff', 'location'],

    ready() {
        //this.getDefaultCustomer();
    },

    methods: {
        getDefaultCustomer() {
            var url = '/api/v0/customers?phone=' + this.location.phone_number + '&location_id=' + this.location.id;

            this.$http.get(url, {api_token: this.location.api_token}).then(function(response) {
                      // get status
                this.$set('error', '');      
                this.$set('customer', response.data.data[0]);
            }, function(response) {
                //TODO: Error
            });
        },

        clearInputs() {
            this.customer = [];
            this.customer = {
                province: 'British Columbia',
                country: 'Canada'
            }
        },

        getCustomer(e) {
            var url = '/api/v0/customers?phone=' + this.phoneNumber + '&location_id=' + this.location.id + '&api_token=' + this.location.api_token;

            this.$http.get(url).then(function(response) {
                      // get status
                this.$set('error', '');
                this.$set('customer', response.data.data[0]);
                this.$set("customer['new_customer']", false);
            }, function(response) {
                //TODO: Error
                this.clearInputs();
                this.showNewCustomerModal = true;
            });
        }
    },

    events: {
        'new-sale': function() {
            this.getDefaultCustomer();
        },

        'new-part-order': function() {
            this.getDefaultCustomer();
        },

        'new-repair-order': function() {
            this.getDefaultCustomer();
        },
    }
});

</script>
