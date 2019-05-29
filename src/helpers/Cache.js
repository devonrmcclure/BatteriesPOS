class Cache {

    static isCached(key) {
        const data = this.getCache(key);
        const currentDate = Date.now();
        
        if(data) {
            if(data.expires < currentDate) {
                return false;
            }

            return data;
        }

        return false;
    }

    static getCache(key) {
        return JSON.parse(localStorage.getItem(key));
    }

    //Expires in seconds
    static setCache(key, data, expires = 2592000) {
        expires = Date.now() + (expires * 1000);
        data = JSON.stringify({...{data}, ...{expires}});
        localStorage.setItem(key, data);
    }

}

export default Cache;