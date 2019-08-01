import Base from './Base';
import axios from 'axios';

class Inventory extends Base {
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

	async get(id = undefined, options) {
		try {
			if (id) {
				if (options) {
					return await axios.get(
						`${this.endpoint}/${id}?include=${
							options.with
						}`
					);
				}
				return await axios.get(`${this.endpoint}/${id}`);
			}

			if (options) {
				return await axios.get(
					`${this.endpoint}?include=${options.with}`
				);
			}
			return await axios.get(`${this.endpoint}`);
		} catch (error) {
			console.log(error);
			return {
				
				error: error.response.data.message
			};
		}
	}
}

export default new Inventory();
