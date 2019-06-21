import Cache from '@/helpers/Cache';
import SaleSettings from '@/api/endpoints/SaleSettings';

const init = async ({ commit }) => {
	let saleSettings = Cache.isCached('sale-settings');

	if (!saleSettings) {
		saleSettings = await SaleSettings.get();
		saleSettings = saleSettings.data.data;
		Cache.setCache('sale-settings', saleSettings);
	}

	commit('SET_PST_RATE', saleSettings.data.pst_rate);
	commit('SET_GST_RATE', saleSettings.data.gst_rate);
};

export default {
	init
};
