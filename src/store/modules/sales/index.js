import actions from './actions';
import mutations from './mutations';
import getters from './getters';

export default {
	namespaced: true,
	state: {
		nextInvoice: '',
		showDialog: false,
		latest: {},
		isRefund: false,
		products: []
	},
	actions,
	mutations,
	getters
};
