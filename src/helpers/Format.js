import moment from 'moment';

class Format {
	static currency(value) {
		return (
			'$' + (value / 100).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')
		);
	}

	static phoneNumber(value) {
		return value.replace(/(\d{3})(\d{3})(\d{4})/, '$1-$2-$3');
	}

	static dateISO(value) {
		const format = moment(value).format('YYYY-MM-DD HH:mm');
		if (format != 'Invalid date') {
			return format;
		}

		return 'Not Yet';
	}

	static dateHuman(value) {
		const format = moment(value).format('MMM Do YYYY');
		if (format != 'Invalid date') {
			return format;
		}

		return 'Not Yet';
	}
}

export default Format;
