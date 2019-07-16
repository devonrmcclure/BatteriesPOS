import Vue from 'vue';
import Vuex from 'vuex';
import PaymentMethod from '@/api/endpoints/PaymentMethod';
import Cache from '@/helpers/Cache';
import locationModule from './modules/location';
import staffModule from './modules/staff';
import salesModule from './modules/sales';
import productsModule from './modules/products';
import customersModule from './modules/customers';
import settingsModule from './modules/settings';
import partOrdersModule from './modules/partorders';

Vue.use(Vuex);

export const store = new Vuex.Store({
	strict: true,
	state: {
		paymentMethods: [],
		error: {
			show: false,
			message: 'hi'
		}
	},
	modules: {
		location: locationModule,
		staff: staffModule,
		sales: salesModule,
		products: productsModule,
		customers: customersModule,
		settings: settingsModule,
		partOrders: partOrdersModule
	},

	actions: {
		initStore({ dispatch }) {
			dispatch('staff/init');
			dispatch('sales/init');
			dispatch('settings/init');
			dispatch('loadPaymentMethods');
			dispatch('location/init');
			dispatch('customers/init');
			dispatch('partOrders/init');
		},
		async loadPaymentMethods({ commit }) {
			let methods = Cache.isCached('paymentmethods');

			if (!methods) {
				methods = await PaymentMethod.get();
				methods = methods.data;
				Cache.setCache('paymentmethods', methods.data);
			}

			commit('SET_PAYMENT_METHODS', methods.data);
		},

		setErrorState({ commit }, payload) {
			commit('SET_ERROR_STATE', payload);
		},

		clearErrorState({ commit }) {
			commit('CLEAR_ERROR_STATE');
		}
	},

	mutations: {
		SET_PAYMENT_METHODS(state, payload) {
			state.paymentMethods = payload;
		},

		SET_ERROR_STATE(state, payload) {
			state.error = payload;
		},

		CLEAR_ERROR_STATE(state) {
			state.error = { show: false, message: '' };
		}
	}
});
