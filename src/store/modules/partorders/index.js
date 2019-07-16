import actions from './actions';
import mutations from './mutations';

export default {
	namespaced: true,
	state: {
		showDialog: false,
		orderNumber: '',
		products: [],
		invoices: [],
		latest: {}
	},
	actions,
	mutations
};
