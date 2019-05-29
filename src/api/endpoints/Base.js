export default class Base 
{
    constructor() {
        this.BASE_URL = 'http://batteriesapi.test/api';
    }

    get baseUrl() {
        return this.BASE_URL;
    }
}