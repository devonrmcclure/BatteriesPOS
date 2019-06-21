const SET_PST_RATE = (state, payload) => {
	state.PST_RATE = payload;
};

const SET_GST_RATE = (state, payload) => {
	state.GST_RATE = payload;
};

export default {
	SET_GST_RATE,
	SET_PST_RATE
};
