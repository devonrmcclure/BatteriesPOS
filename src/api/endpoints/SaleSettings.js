import Base from './Base';
import axios from 'axios';

class SaleSettings extends Base {
	constructor() {
		super();
		this._endpoint = this.baseUrl + '/sales/settings';
	}

	get endpoint() {
		return this._endpoint;
	}

	set endpoint(val) {
		throw new Error('Endpoint is immutable');
	}

	async get() {
		try {
			return await axios.get(`${this.endpoint}`);
		} catch (error) {
			return {
				error: error.response.data.message
			};
		}
	}
}

export default new SaleSettings();
