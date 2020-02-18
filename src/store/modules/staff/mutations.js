const SET_STAFF = (state, staff) => {
    let s = [];
    staff.forEach((item) => {
        return s[item.initials] =  {
            name: item.name
        };
    });

    state.staff = {...s};
};

export default {
    SET_STAFF
}