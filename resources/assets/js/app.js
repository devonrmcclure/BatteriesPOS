import Vue from 'vue';
import VueResource from 'vue-resource';
import Inventory from './components/Inventory/Inventory.vue';
import InventoryInfo from './components/Inventory/InventoryInfo.vue';
import InventoryHistory from './components/Inventory/InventoryHistory.vue';
import RepLoginModal from './components/Modals/RepLoginModal.vue';
import DailySalesStats from './components/Stats/DailySalesStats.vue';
import RepairOrders from './components/RepairOrders/RepairOrders.vue';
import PartOrders from './components/PartOrders/PartOrders.vue';
import CustomerList from './components/Customer/CustomerList.vue';
import ViewPartOrder from './components/PartOrders/ViewPartOrder.vue';
import Dashboard from './components/Admin/Dashboard.vue';
import AdminInventory from './components/Admin/Inventory.vue';
import CloseOut from './components/CloseOut/CloseOut.vue';
import './directives/Ajax';

Vue.use(VueResource);
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('input[name="_token"]').value;

new Vue({
    el: '#app',
    components: {RepLoginModal, DailySalesStats, Inventory, InventoryInfo, InventoryHistory, RepairOrders, PartOrders, CustomerList, ViewPartOrder, Dashboard, AdminInventory, CloseOut},
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
        },
    }
});
