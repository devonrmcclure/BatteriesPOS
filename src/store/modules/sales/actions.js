import Sales from '@/api/endpoints/Sale';

const init = async ({commit}) => {
    const sales = await Sales.getLatest();
    commit('SET_LATEST_SALES', sales.data);
    commit('SET_NEXT_INVOICE', sales.data.data[0].attributes.invoice_number)
}

export default {
    init
}