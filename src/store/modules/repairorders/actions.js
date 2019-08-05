import RepairOrder from '@/api/endpoints/RepairOrder';

const init = async ({ commit }) => {
	const repairOrders = await RepairOrder.get();
	if (repairOrders.status == 200) {
		commit('SET_LATEST_REPAIR_ORDERS', repairOrders.data);
		commit('SET_NEXT_ORDER_NUMBER', repairOrders.data.data[0].order_number);
		commit('SET_NEXT_ORDER_ID', repairOrders.data.data[0].id + 1);
	} else {
		commit('SET_NEXT_ORDER_NUMBER', 400000);
	}
};

export default {
	init
};
