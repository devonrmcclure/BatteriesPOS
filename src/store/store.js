import Vue from 'vue';
import Vuex from 'vuex';
import PaymentMethod from '@/api/endpoints/PaymentMethod';
import Cache from '@/helpers/Cache';
import locationModule from './modules/location';
import staffModule from './modules/staff';
import salesModule from './modules/sales';
import productsModule from './modules/products';
import customersModule from './modules/customers';

Vue.use(Vuex);

export const store = new Vuex.Store({
	strict: true,
	state: {
		paymentMethods: []
	},
	modules: {
		location: locationModule,
		staff: staffModule,
		sales: salesModule,
		products: productsModule,
		customers: customersModule
	},

	actions: {
		async initStore({ dispatch }) {
			dispatch('staff/init');
			dispatch('sales/init');
			dispatch('loadPaymentMethods');
			await dispatch('location/init');
			await dispatch('customers/init');
		},
		async loadPaymentMethods({ commit }) {
			let methods = Cache.isCached('paymentmethods');

			if (!methods) {
				methods = await PaymentMethod.get();
				methods = methods.data;
				Cache.setCache('paymentmethods', methods.data);
			}

			commit('SET_PAYMENT_METHODS', methods.data);
		}
	},

	mutations: {
		SET_PAYMENT_METHODS(state, payload) {
			state.paymentMethods = payload;
		}
	}
});
