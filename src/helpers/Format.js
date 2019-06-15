class Format {
	static currency(value) {
		return (
			'$' + (value / 100).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')
		);
	}
}

export default Format;
