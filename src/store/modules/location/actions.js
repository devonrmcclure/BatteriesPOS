import Cache from '@/helpers/Cache';
import Location from '@/api/endpoints/Location';

const init = async ({commit}) => {
    let location = Cache.isCached('location');

    if (!location) {
        location = await Location.get();
        Cache.setCache('location', location.data);
    }
    
    commit('SET_NAME', location.data.attributes.name);
    commit('SET_EMAIL', location.data.attributes.email);
}

export default {
    init
}