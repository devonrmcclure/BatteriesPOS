const SET_LATEST_SALES = (state, sales) => {
	let s = [];
	// 5 for the 5 most recent sales.
	for (let i = 0; i < 5; i++) {
		if (sales.data[i]){
			s.push(sales.data[i]);
		}
	}
	state.latest = { ...s };
};

const SET_SALES_HISTORY = (state, sales) => {
	let s = [];
	sales.data.forEach(item => {
		s.push(item);
	});
	state.history = { ...s };
};

const SET_NEXT_INVOICE = (state, invoice) => {
	state.nextInvoice = invoice + 1;
};

const SET_SHOW_DIALOG = (state, show) => {
	state.showDialog = show;
};

const ADD_PRODUCT_TO_SALE = (state, product) => {
	state.products.push({ ...product });
};

const CLEAR_SALE_PRODUCTS = state => {
	state.products = [];
};

const SET_REFUND_STATE = (state, payload) => {
	state.isRefund = payload;
};

const SET_PART_ORDER_STATE = (state, payload) => {
	state.isPartOrder = payload;
};

const SET_PART_ORDER_ID = (state, payload) => {
	state.partOrderID = payload;
};

export default {
	SET_LATEST_SALES,
	SET_NEXT_INVOICE,
	SET_SHOW_DIALOG,
	ADD_PRODUCT_TO_SALE,
	CLEAR_SALE_PRODUCTS,
	SET_REFUND_STATE,
	SET_PART_ORDER_STATE,
	SET_PART_ORDER_ID,
	SET_SALES_HISTORY
};
