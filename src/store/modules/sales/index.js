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
		isPartOrder: false,
		isRepairOrder: false,
		isDeposit: false,
		products: []
	},
	actions,
	mutations,
	getters
};
