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
import ViewRepairOrder from './components/RepairOrders/ViewRepairOrder.vue';
import Dashboard from './components/Admin/Dashboard.vue';
import AdminInventory from './components/Admin/Inventory.vue';
import CloseOut from './components/CloseOut/CloseOut.vue';
import Invoice from './components/Invoice/Invoice.vue';
import InvoiceInfo from './components/Invoice/InvoiceInfo.vue';
import Staff from './components/Admin/Staff/Staff.vue';
import StockTransferHistory from './components/StockTransfer/StockTransferHistory.vue';
import StockTransferOrder from './components/StockTransfer/StockTransferOrder.vue';
import StockTransferRequest from './components/StockTransfer/StockTransferRequest.vue';
import AdminInventoryOrders from './components/Admin/Inventory/InventoryOrders.vue';
import AdminVendorOrders from './components/Admin/Inventory/AdminVendorOrders.vue';
import AdminRepairOrders from './components/Admin/RepairOrders/AdminRepairOrders.vue';
import AdminRepairOrdersShow from './components/Admin/RepairOrders/AdminRepairOrdersShow.vue';
import AdminPartOrders from './components/Admin/PartOrders/AdminPartOrders.vue';
import AdminPartOrdersShow from './components/Admin/PartOrders/AdminPartOrdersShow.vue';
import DailyToDo from './components/ToDo/DailyToDo.vue';
import WeeklyToDo from './components/ToDo/WeeklyToDo.vue';

import './directives/Ajax';

Vue.use(VueResource);
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('input[name="_token"]').value;

new Vue({
    el: '#app',
    components: {RepLoginModal, DailySalesStats, Inventory, InventoryInfo, InventoryHistory, RepairOrders, PartOrders, CustomerList, ViewPartOrder, Dashboard, AdminInventory, CloseOut, Invoice, InvoiceInfo, Staff, StockTransferHistory, StockTransferOrder, AdminInventoryOrders, StockTransferRequest, AdminVendorOrders, AdminRepairOrders, AdminRepairOrdersShow, ViewRepairOrder, AdminPartOrders, AdminPartOrdersShow, DailyToDo, WeeklyToDo},
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
