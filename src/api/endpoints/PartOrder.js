import Base from './Base';
import axios from 'axios';

class PartOrder extends Base {
	constructor() {
		super();
		this._endpoint = this.baseUrl + '/part-orders';
	}

	get endpoint() {
		return this._endpoint;
	}

	set endpoint(val) {
		throw new Error('Endpoint is immutable');
	}

	async get(id = undefined, ...options) {
		// TODO: Implement options (filter/with/etc);
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

	async post(data) {
		try {
			return await axios.post(this.endpoint, data);
		} catch (error) {
			return {
				error: error.response.data.message
			};
		}
	}
}

export default new PartOrder();