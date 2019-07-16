const SET_LATEST_PART_ORDERS = (state, partOrders) => {
	let s = [];
	partOrders.data.forEach(item => {
		s.push(item);
	});
	state.latest = { ...s };
};

const SET_NEXT_ORDER_NUMBER = (state, orderNumber) => {
	state.orderNumber = orderNumber + 1;
};

const SET_SHOW_DIALOG = (state, show) => {
	state.showDialog = show;
};

export default {
	SET_LATEST_PART_ORDERS,
	SET_NEXT_ORDER_NUMBER,
	SET_SHOW_DIALOG
};
