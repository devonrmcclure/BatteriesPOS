class Format {
	constructor() {}
	static currency(value) {
		return `$${(value / 100).toFixed(2)}`;
	}
}

export default Format;
