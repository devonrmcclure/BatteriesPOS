import Base from './Base';
import axios from 'axios';

class Product extends Base {
	constructor() {
		super();
		this._endpoint = this.baseUrl + '/products';
	}

	get endpoint() {
		return this._endpoint;
	}

	set endpoint(val) {
		throw new Error('Endpoint is immutable');
	}

	async get(id = undefined) {
		try {
			if (id) {
				return await axios.get(`${this.endpoint}/${id}`);
			}

			return await axios.get(this.endpoint);
		} catch (error) {
			return {
				error: error.response.data.message
			};
		}
	}
}

export default new Product();