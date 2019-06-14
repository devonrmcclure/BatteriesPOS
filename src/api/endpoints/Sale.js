import Base from './Base';
import axios from 'axios';

class Sale extends Base {
	constructor() {
		super();
		this._endpoint = this.baseUrl + '/sales';
	}

	get endpoint() {
		return this._endpoint;
	}

	set endpoint(val) {
		throw new Error('Endpoint is immutable');
	}

	async get(id = undefined, ...options) {
		// TODO: Implement options (filter/with/etc);
		console.log(options);
		try {
			if (id) {
				return await axios.get(`${this.endpoint}/${id}`);
			}
			return await axios.get(`${this.endpoint}`);
		} catch (error) {
			return {
				error: error.response.data.message
			};
		}
	}

	async getLatest() {
		try {
			return await axios.get(`${this.endpoint}/latest`);
		} catch (error) {
			return {
				error: error.response.data.message
			};
		}
	}
}

export default new Sale();
