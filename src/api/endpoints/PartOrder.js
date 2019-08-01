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

	async get(id = undefined, options) {
		// TODO: Implement options (filter/with/etc);
		try {
			if (id) {
				if (options['with']) {
					return await axios.get(
						`${this.endpoint}/${id}?include=${options.with}`
					);
				}
				return await axios.get(`${this.endpoint}/${id}`);
			}

			if (options['with']) {
				return await axios.get(
					`${this.endpoint}?include=${options.with}`
				);
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

	async getOutstanding(options) {
		try {
			if (options) {
				return await axios.get(
					`${this.endpoint}/outstanding?include=${options.with}`
				);
			}
			return await axios.get(`${this.endpoint}/outstanding`);
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

	async put(id, data) {
		try {
			return await axios.put(`${this.endpoint}/${id}`, data);
		} catch (error) {
			return {
				error: error.response.data.message
			};
		}
	}
}

export default new PartOrder();
