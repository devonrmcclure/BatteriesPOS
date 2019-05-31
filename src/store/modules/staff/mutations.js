const SET_STAFF = (state, staff) => {
    let s = [];
    staff.forEach((item) => {
        return s[item.attributes.initials] =  {
            name: item.attributes.name
        };
    });

    state.staff = {...s};
};

export default {
    SET_STAFF
}