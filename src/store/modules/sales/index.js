import actions from './actions';
import mutations from './mutations';
import getters from './getters';

export default {
	namespaced: true,
	state: {
		nextInvoice: '',
		showDialog: false,
		latest: {},
		history: {},
		isRefund: false,
		isPartOrder: false,
		isRepairOrder: false,
		isDeposit: false,
		products: [],
		partOrderID: null
	},
	actions,
	mutations,
	getters
};
