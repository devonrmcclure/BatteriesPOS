import Vue from 'vue'
import axios from 'axios';
import App from './App.vue'
import router from './router'
import Vuetify from 'vuetify';
import Cache from './helpers/Cache';
import { store } from './store/store';
import 'vuetify/dist/vuetify.min.css';


Vue.use(Vuetify);
Vue.config.productionTip = false;

const auth = Cache.isCached('auth');

if (auth)
{
	axios.defaults.headers.common['Authorization'] = `${auth.data.token_type}  ${auth.data.access_token}`;
}

axios.defaults.headers.post['Accept'] = 'application/json';
axios.defaults.headers.post['Content-Type'] = 'application/json';

new Vue({
	router,
	store,
	render: h => h(App)
}).$mount('#app')
