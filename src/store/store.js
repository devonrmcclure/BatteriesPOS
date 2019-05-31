import Vue from 'vue';
import Vuex from 'vuex';
import locationModule from './modules/location';
import staffModule from './modules/staff';
import salesModule from './modules/sales';

Vue.use(Vuex);

export const store = new Vuex.Store({
    strict: true,
    modules: {
        location: locationModule,
        staff: staffModule,
        sales: salesModule
    },

    actions: {
        async initStore({dispatch}) {
            dispatch('location/init');
            dispatch('staff/init');
            dispatch('sales/init');
        }
    }
});
