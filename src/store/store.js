import Vue from 'vue';
import Vuex from 'vuex';
import locationModule from './modules/location';

Vue.use(Vuex);

export const store = new Vuex.Store({
    strict: true,
    modules: {
        location: locationModule
    },

    actions: {
        async initStore({dispatch}) {
            dispatch('location/init');
        }
    }
});
