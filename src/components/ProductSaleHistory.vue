<template>
<v-dialog v-model="showHistory" persistent full-width origin="top center">
	<v-card>
		<v-card-title>
			<v-spacer></v-spacer>
			<h2>Sku {{ historyProduct[0].sku }} history</h2>
			<v-spacer></v-spacer>
		</v-card-title>

		<v-data-table
			:headers="headers"
			:items="historyProduct[0].sales"
			:search="search"
			disable-initial-sort
		>
			<template v-slot:items="props">
				<td>{{ props.item.invoice }}</td>
				<td>{{ props.item.description }}</td>
                <td>{{ props.item.quantity }}</td>
				<td>{{ props.item.price | formatCurrency }}</td>
                <td>{{ props.item.extended | formatCurrency }}</td>
                <td>{{ props.item.pst | formatCurrency }}</td>
                <td>{{ props.item.gst | formatCurrency }}</td>
                <td>{{ props.item.total | formatCurrency }}</td>
                <td>{{ props.item.created | formatDateISO }}</td>

				
				
			</template>
			<template v-slot:footer>
                <td :colspan="2">
                    <strong>Totals</strong>
                </td>
                <td>
                    <strong>{{ totalSold }}</strong>
                </td>
                <td>
                    
                </td>
                <td>
                    <strong>{{ totalExtended | formatCurrency }}</strong>
                </td>
                <td>
                    <strong>{{ totalPST | formatCurrency }}</strong>
                </td>
                <td>
                    <strong>{{ totalGST | formatCurrency }}</strong>
                </td>
                <td>
                    <strong>{{ totalPriceWithTax | formatCurrency }}</strong>
                </td>
            </template>
		</v-data-table>

        <v-card-actions>
            <v-spacer></v-spacer>    
            <v-btn color="error" @click="close()">close</v-btn>
        </v-card-actions>
	</v-card>
</v-dialog>
</template>

<script>
import { mapState } from "vuex";
export default {
	data() {
		return {
			search: "",
			headers: [
				{ text: "Invoice", value: "invoice", width: "1%" },
                { text: "Description", value: "description", width: "1%" },
                { text: "Quantity", value: 'quantity', width: "1%" },
                { text: "Price", value: "price" },
                { text: "Extended", value: "extended" },
				{ text: "PST", value: "pst" },
				{ text: "GST", value: "gst" },
                { text: "Total", value: "total" },
                { text: "Date", value: "created" }
			],
			products: []
		};
	},

	methods: {
        close () {
            this.$store.commit('products/SET_SHOW_HISTORY', false);
        }
	},

	computed: {
        ...mapState("products", ["showHistory", "historyProduct"]),

        totalSold() {
            let total = 0;

            for(let sale of this.historyProduct[0].sales) {
                total += sale.quantity;
            }

            return total;
        },

        totalExtended() {
            let total = 0;

            for(let sale of this.historyProduct[0].sales) {
                total += sale.extended;
            }

            return total;
        },

        totalPST() {
            let total = 0;

            for(let sale of this.historyProduct[0].sales) {
                total += sale.pst;
            }

            return total;
        },

        totalGST() {
            let total = 0;

            for(let sale of this.historyProduct[0].sales) {
                total += sale.gst;
            }

            return total;
        },

        totalPriceWithTax() {
            let total = 0;

            for(let sale of this.historyProduct[0].sales) {
                total += sale.total;
            }

            return total;
        },
	}
};
</script>