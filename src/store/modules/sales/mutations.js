const SET_LATEST_SALES = (state, sales) => {
	let s = [];
	sales.data.forEach(item => {
		s.push(item);
	});
	state.latest = { ...s };
};

const SET_NEXT_INVOICE = (state, invoice) => {
	state.nextInvoice = invoice + 1;
};

const SET_SHOW_DIALOG = (state, show) => {
	state.showDialog = show;
}

const ADD_PRODUCT_TO_SALE = (state, product) => {
	state.products.push({...product});
}

const CLEAR_SALE_PRODUCTS = (state) => {
	state.products = [];
}

const SET_REFUND_STATE = (state, payload) => {
	state.isRefund = payload;
}

const SET_PART_ORDER_STATE = (state, payload) => {
	state.isPartOrder = payload;
};

export default {
	SET_LATEST_SALES,
	SET_NEXT_INVOICE,
	SET_SHOW_DIALOG,
	ADD_PRODUCT_TO_SALE,
	CLEAR_SALE_PRODUCTS,
	SET_REFUND_STATE,
	SET_PART_ORDER_STATE
};
