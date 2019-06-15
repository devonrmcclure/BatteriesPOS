import actions from './actions';
import mutations from './mutations';
import getters from './getters';

export default {
	namespaced: true,
	state: {
		// Literally just every product added since a refresh.
		common: []
	},
	actions,
	mutations,
	getters
};
