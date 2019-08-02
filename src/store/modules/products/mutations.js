const ADD_COMMON_PRODUCT = (state, product) => {
	state.common.push(product);
};

const SET_SHOW_HISTORY = (state, payload) => {
	state.showHistory = payload;
};

const SET_HISTORY_PRODUCT = (state, payload) => {
	state.historyProduct = [payload];
};

export default {
	ADD_COMMON_PRODUCT,
	SET_SHOW_HISTORY,
	SET_HISTORY_PRODUCT
};
