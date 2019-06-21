import actions from './actions';
import mutations from './mutations';
import getters from './getters';

export default {
	namespaced: true,
	state: {
		PST_RATE: 0,
		GST_RATE: 0
	},
	actions,
	mutations,
	getters
};
