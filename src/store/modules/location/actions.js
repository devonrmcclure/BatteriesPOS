import Cache from '@/helpers/Cache';
import Location from '@/api/endpoints/Location';

const init = async ({ commit }) => {
	let location = Cache.isCached('location');

	if (!location) {
		location = await Location.get();
		console.log(location);
		Cache.setCache('location', location.data);
	}

	commit('SET_LOCATION', location.data.attributes);
};

export default {
	init
};
