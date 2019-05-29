import Location from '@/api/endpoints/Location';

const init = async ({state, commit}) => {
    if (!state.name || !state.email)
    {
        const location = await Location.get();
        await commit('SET_NAME', location.data.attributes.name);
        await commit('SET_EMAIL', location.data.attributes.email);
    }
}

export default {
    init
}