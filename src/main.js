import Vue from 'vue';
import axios from 'axios';
import App from './App.vue';
import router from './router';
import Vuetify from 'vuetify';
import Cache from './helpers/Cache';
import { store } from './store/store';
import 'vuetify/dist/vuetify.min.css';
import Format from '@/helpers/Format';

Vue.use(Vuetify);
Vue.config.productionTip = false;

const auth = Cache.isCached('auth');

if (auth) {
	axios.defaults.headers.common['Authorization'] = `${
		auth.data.token_type
	}  ${auth.data.access_token}`;
}

axios.defaults.headers.common['Accept'] = 'application/json';
axios.defaults.headers.common['Content-Type'] = 'application/json';

Vue.filter('formatCurrency', Format.currency);

new Vue({
	router,
	store,
	render: h => h(App)
}).$mount('#app');
