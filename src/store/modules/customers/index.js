import actions from './actions';
import mutations from './mutations';
import getters from './getters';

export default {
	namespaced: true,
	state: {
		customer: {
			id: '',
			name: '',
			phone: '',
			address: ''
		}
	},
	actions,
	mutations,
	getters
};
