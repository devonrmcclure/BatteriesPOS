import Base from './Base';
import axios from 'axios';

class Login extends Base 
{
    constructor() {
        super();
        this._endpoint = this.baseUrl + '/login'
    }

    get endpoint() {
        return this._endpoint;
    }

    set endpoint(val) {
        throw new Error('Endpoint is immutable');
    }


    // Send login request...
    async post({...payload}) {
        try {
            return await axios.post(this.endpoint, payload);
        } catch (error) {
            return {
                'error': error.response.data.message
            }
        }
    }
}

export default new Login();