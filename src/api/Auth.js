import { LOGIN_ENDPOINT } from './endpoints';
import Cache from './Cache';

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
				Cache.setCache('auth', data.data, data.data.expires_in);
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