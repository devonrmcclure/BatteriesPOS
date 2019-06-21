class Format {
	static currency(value) {
		return (
			'$' + (value / 100).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')
		);
	}

	static phoneNumber(value) {
		return value.replace(/(\d{3})(\d{3})(\d{4})/, '$1-$2-$3');
	}
}

export default Format;
