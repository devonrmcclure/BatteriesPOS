import { LOGIN_ENDPOINT } from './endpoints';

class Auth {
	static async login(username, password) {
		let success = false;
		const body = { username, password };

		try {
			const response = await fetch(LOGIN_ENDPOINT, {
				method: 'POST',
				body: JSON.stringify(body)
			});

			const data = await response.json();

			if(data.status === 200) {
				localStorage.setItem('token', data.data.access_token);
				success = true;
				// TODO: Set name (White Rock) and user ID.
			}
			return {
				'success': success,
				'error': data.error
			}

		} catch(err) {
			return {
				'error': 'Something went wrong with the API request. Maybe internet is down?'
			}
		}
	}
}

export default Auth;