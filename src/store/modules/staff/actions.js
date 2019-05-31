import Cache from '@/helpers/Cache';
import Staff from '@/api/endpoints/Staff';

const init = async ({commit}) => {
    let staff = Cache.isCached('staff');

    if(!staff) {
        staff = await Staff.get();
        staff = staff.data;
        Cache.setCache('staff', staff.data);
    }

    commit('SET_STAFF', staff.data);
}

export default {
    init
}