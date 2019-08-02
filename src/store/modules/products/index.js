import actions from './actions';
import mutations from './mutations';
import getters from './getters';

export default {
	namespaced: true,
	state: {
		// Literally just every product added since a refresh.
		common: [],
		showHistory: false,
		historyProduct: [
			{
				sales: []
			}
		]
	},
	actions,
	mutations,
	getters
};
