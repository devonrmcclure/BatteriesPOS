import Vue from 'vue';
import VueResource from 'vue-resource';
import Inventory from './components/Inventory/Inventory.vue';
import RepLoginModal from './components/Modals/RepLoginModal.vue';
import DailySalesStats from './components/Stats/DailySalesStats.vue';
import RepairOrders from './components/RepairOrders/RepairOrders.vue';
import PartOrders from './components/PartOrders/PartOrders.vue';
import CustomerList from './components/Customer/CustomerList.vue';
import './directives/Ajax';

Vue.use(VueResource);
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('input[name="_token"]').value;

new Vue({
    el: '#app',
    components: {RepLoginModal, DailySalesStats, Inventory, RepairOrders, PartOrders, CustomerList},
    data() {
    	return {
        	showNewSaleModal: false,
        	showRepLoginModal: false,
            showNewRepairOrdersModal: false
    	}
    },

    events: {
        'new-sale': function() {
            this.$dispatch('new-sale');
        },

        'form-done': function() {
            this.$dispatch('form-done');
        }
    }
});
