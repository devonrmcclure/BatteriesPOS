<template>
    <div>
    <v-data-table
        :headers="headers"
        :items="sales"
        class="elevation-1"
    >
        <template v-slot:items="props">
            <td>{{ props.item.invoice_number }}</td>
            <td class="text-xs-right">{{ props.item.subtotal }}</td>
            <td class="text-xs-right">{{ props.item.pst }}</td>
            <td class="text-xs-right">{{ props.item.gst }}</td>
            <td class="text-xs-right">{{ props.item.total }}</td>
        </template>
    
    </v-data-table>
    </div>

</template>

<script>
import { mapState } from 'vuex';
export default {
    data () {
        return {
        headers: [
            {
            text: 'Invoice',
            value: 'invoiceNumber'
            },
            { text: 'Subtotal', value: 'subtotal' },
            { text: 'PST', value: 'pst' },
            { text: 'GST', value: 'gst' },
            { text: 'total', value: 'total' }
        ],
        }
    },

    computed: {
        ...mapState('sales', ['latest']),
        sales() {
            return Object.values(this.latest)
        }
    }
}
</script>