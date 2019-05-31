import Base from './Base';
import axios from 'axios';

class Staff extends Base 
{
    constructor() {
        super();
        this._endpoint = this.baseUrl + '/staff'
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
                'error': error.response.data.message
            }
        }
    }

    async getByFilter(filter, value, id = undefined) {

        try {
            
            if (id) {
                return await axios.get(`${this.endpoint}/${id}?filter[${filter}]=${value}`);
            }

            return await axios.get(this.endpoint + `?filter[${filter}]=${value}`);
        } catch (error) {
            return {
                'error': error.response.data.message
            }
        }
    }
}

export default new Staff();