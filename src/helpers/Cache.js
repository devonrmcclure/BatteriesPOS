class Cache {
	static isCached(key) {
		const data = this.getCache(key);
		const currentDate = Date.now();

		if (data) {
			if (data.expires <= currentDate) {
				localStorage.removeItem(key);
				return false;
			}
			return data;
		}

		return false;
	}

	static getCache(key) {
		return JSON.parse(localStorage.getItem(key));
	}

	//Expires in seconds. Default 18 hours.
	static setCache(key, data, expires = 64800) {
		expires = Date.now() + expires * 1000;
		data = JSON.stringify({ ...{ data }, ...{ expires } });
		localStorage.setItem(key, data);
	}

	static clearCache() {
		localStorage.clear();
	}
}

export default Cache;
