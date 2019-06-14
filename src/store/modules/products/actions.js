const addCommonProduct = async ({ commit }, product) => {
	commit('ADD_COMMON_PRODUCT', product);
};

export default {
	addCommonProduct
};
