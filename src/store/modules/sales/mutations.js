const SET_LATEST_SALES = (state, sales) => {
    return state.latest = sales;
}

const SET_NEXT_INVOICE = (state, invoice) => {
    return state.nextInvoice = invoice + 1;
}


export default {
    SET_LATEST_SALES,
    SET_NEXT_INVOICE
}