import Customer from '@/api/endpoints/Customer';
import Cache from '@/helpers/Cache';

const init = async ({ dispatch }) => {
	let customer = Cache.isCached('customer').data;

	if (!customer) {
		customer = await Customer.getByFilter('type', 'default');
		customer = customer.data.data[0];
		Cache.setCache('customer', customer);
	}
	dispatch('setCustomer', customer.attributes);
};

const setCustomer = ({ commit }, payload) => {
	commit('SET_CUSTOMER', payload);
};

export default {
	init,
	setCustomer
};
