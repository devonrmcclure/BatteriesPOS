import Vue from 'vue'
import Router from 'vue-router'
import Dashboard from './views/Dashboard.vue'
import Login from './views/Login.vue';
import NotFound from './views/errors/NotFound.vue';

Vue.use(Router);

const router = new Router({
	mode: 'history',
	base: process.env.BASE_URL,
	routes: [
		{
			path: '/',
			name: 'dashboard',
			component: Dashboard,
			meta: {
				requiresAuth: true
			}
		},
		{
			path: '/login',
			name: 'login',
			component: Login,
			meta: {
				guest: true
			}
		},
		{
			path: '/404',
			name: 'notFound',
			component: NotFound
		},
		{
			path: '*',
			name: 'noRoute',
			redirect: '/404'
		},
		// {
		// 	// path: '/about',
		// 	// name: 'about',
		// 	// // route level code-splitting
		// 	// // this generates a separate chunk (about.[hash].js) for this route
		// 	// // which is lazy-loaded when the route is visited.
		// 	// component: () => import(/* webpackChunkName: "about" */ './views/About.vue')
		// }
	],
});

router.beforeEach((to, from, next) => {
	// The route requires a token to be set in localStorage ("Auth")
	if (to.matched.some(record => record.meta.requiresAuth)) {
		if (localStorage.getItem('token') === null)
		{
			next({
				path: '/login',
				params: { nextUrl: to.fullPath }
			});
		} else
		{
			next();
		}
	// If the route is a Guest route. (basically only login)
	} else if (to.matched.some(record => record.meta.guest)) {
		if (localStorage.getItem('token') === null) {
			next();
		}
		next({ name: 'dashboard' });
	} else
	{
		next()
	}
});

export default router;