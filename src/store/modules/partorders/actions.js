import PartOrder from '@/api/endpoints/PartOrder';

const init = async ({ commit }) => {
	const partOrders = await PartOrder.getLatest();
	if (partOrders.status == 200) {
		commit('SET_LATEST_PART_ORDERS', partOrders.data);
		commit('SET_NEXT_ORDER_NUMBER', partOrders.data.data[0].order_number);
		commit('SET_NEXT_ORDER_ID', partOrders.data.data[0].id + 1);
	} else {
		commit('SET_NEXT_ORDER_NUMBER', 400000);
	}
};

export default {
	init
};
