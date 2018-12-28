import React from 'react';

class LoginForm extends React.Component {
	render() {
		return (
			<form onSubmit={this.props.login}>
				<input type="text" name="username" placeholder="Username" />
				<input type="password" name="password" placeholder="Password" />
				<button>Login</button>
			</form>
		);
	}
}

export default LoginForm;