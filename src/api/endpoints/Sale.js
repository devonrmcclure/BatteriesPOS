import Base from './Base';
import axios from 'axios';

class Sale extends Base 
{
    constructor() {
        super();
        this._endpoint = this.baseUrl + '/sales'
    }

    get endpoint() {
        return this._endpoint;
    }

    set endpoint(val) {
        throw new Error('Endpoint is immutable');
    }

    async getLatest() {
        try {
            return await axios.get(this.baseUrl + '/latest-sales');
        } catch (error) {
            return {
                'error': error.response.data.message
            }
        }
    }
    
}

export default new Sale();