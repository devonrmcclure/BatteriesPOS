import React from 'react';
import { BrowserRouter, Switch, Route, Redirect } from 'react-router-dom';

import Layout from '../views/layouts/Layout';
import Dashboard from '../views/Dashboard';
import Login from '../views/Login';
import NotFound from '../views/NotFound';

const ProtectedRoute = ({...props}) => {
	if (localStorage.getItem('access_token') !== null) {
		return <Route {...props} />
	}
	return <Redirect to='/login' />;
} 

const Router = () => (
	<BrowserRouter>
		<Layout>
			<Switch>
				<ProtectedRoute exact path="/" component={Dashboard} />
				<Route path="/login" component={Login} />
				<ProtectedRoute component={NotFound} />
			</Switch>
		</Layout>
	</BrowserRouter>
);

export default Router;