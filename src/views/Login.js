import React from 'react';
import LoginForm from '../components/forms/LoginForm';

class Login extends React.Component {
	login = async (e) => {
		e.preventDefault();
		let username = e.target.elements.username.value;
		let password = e.target.elements.password.value;
		let body = { username, password };

		const login = await fetch('http://batteriesapi.local/api/login', {
			'method': 'POST',
			'body': JSON.stringify(body)
		});
		const data = await login.json();

		if (login.status === 200) {
			localStorage.setItem('access_token', data.access_token);
			this.props.history.push('/');
		}
	}

	render() {
		return (
			<LoginForm login={this.login} />
		);
	}
}

export default Login;