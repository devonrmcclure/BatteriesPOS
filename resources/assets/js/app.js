import Vue from 'vue';
import VueResource from 'vue-resource';
//import Sale from './Sale.vue';
//import CustomerInfo from './CustomerInfo.vue';
import Inventory from './components/Inventory/Inventory.vue';
import NewSaleModal from './components/Modals/NewSaleModal.vue';
import RepLoginModal from './components/Modals/RepLoginModal.vue';
import DailySalesStats from './components/Stats/DailySalesStats.vue';
import RepairOrders from './components/RepairOrders/RepairOrders.vue';

Vue.use(VueResource);

new Vue({
    el: '#app',
    components: {NewSaleModal, RepLoginModal, DailySalesStats, Inventory, RepairOrders},
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

// $('.rep-login').on('shown.bs.modal', function () {
// $('.rep-code').focus();

// $('.rep-code').on('change', function(e){
// e.preventDefault();
// var url = 'staff/' + $('.rep-code').val();

// $.getJSON(url, function(data) {
// $('.rep').html('<b>Rep:</b> ' + data['name']);
// $('.rep-name').val(data['name']);
// $('.rep-login').modal('hide');
// $('#newSale').modal('show');
// $('.sku:first').focus();
// $('.rep-code').val('');
// });
// });
// });