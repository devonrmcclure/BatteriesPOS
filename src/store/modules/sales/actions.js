import Sales from '@/api/endpoints/Sale';

const init = async ({ commit }) => {
	const sales = await Sales.getLatest();
	if (sales.status == 200) {
		commit('SET_LATEST_SALES', sales.data);
		commit(
			'SET_NEXT_INVOICE',
			sales.data.data[0].invoice_number
		);
	} else {
		commit('SET_NEXT_INVOICE', 400000);
	}
};

const addProduct = ({commit}, product) => {
	commit('ADD_PRODUCT_TO_SALE', product);
}

const clearProducts = ({ commit }) => {
	commit('CLEAR_SALE_PRODUCTS');
};

const setIsRefund = ({commit}, payload) => { 
	commit('SET_REFUND_STATE', payload);
}

export default {
	init,
	addProduct,
	clearProducts,
	setIsRefund
}
