const SET_LATEST_SALES = (state, sales) => {
	let s = [];
	sales.data.forEach(item => {
		s.push(item.attributes);
	});
	state.latest = { ...s };
};

const SET_NEXT_INVOICE = (state, invoice) => {
	return (state.nextInvoice = invoice + 1);
};

export default {
	SET_LATEST_SALES,
	SET_NEXT_INVOICE
};
