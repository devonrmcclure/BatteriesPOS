import Vue from 'vue';
import VueResource from 'vue-resource';
import Inventory from './components/Inventory/Inventory.vue';
import NewSaleModal from './components/Modals/NewSaleModal.vue';
import RepLoginModal from './components/Modals/RepLoginModal.vue';
import DailySalesStats from './components/Stats/DailySalesStats.vue';
import RepairOrders from './components/RepairOrders/RepairOrders.vue';
import PartOrders from './components/PartOrders/PartOrders.vue';
import './directives/Ajax';

Vue.use(VueResource);
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('input[name="_token"]').value;

new Vue({
    el: '#app',
    components: {NewSaleModal, RepLoginModal, DailySalesStats, Inventory, RepairOrders, PartOrders},
    data() {
    	return {
        	showNewSaleModal: false,
        	showRepLoginModal: false,
            showNewRepairOrdersModal: false
    	}
    },

    events: {
        'new-sale': function() {
            this.$broadcast('new-sale');
        }
    }
});
