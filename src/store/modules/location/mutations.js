const SET_LOCATION = (state, payload) => {
	state.name = payload.name;
	state.phone = payload.phone;
	state.email = payload.email;
	state.address = payload.address;
};

export default {
	SET_LOCATION
};
