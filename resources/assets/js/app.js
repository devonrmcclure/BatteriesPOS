import Vue from 'vue';
import VueResource from 'vue-resource';
//import Sale from './Sale.vue';
//import CustomerInfo from './CustomerInfo.vue';
import NewSaleModal from './components/Modals/NewSaleModal';
import RepLoginModal from './components/Modals/RepLoginModal';

Vue.use(VueResource);

new Vue({
    el: '#app',
    components: {NewSaleModal, RepLoginModal},
    data() {
    	return {
        	showNewSaleModal: false,
        	showRepLoginModal: false
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