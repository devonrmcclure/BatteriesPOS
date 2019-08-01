<template>
	<v-card>
		<v-data-table :headers="headers" :items="sales" hide-actions disable-initial-sort>
			<template v-slot:items="props">
				<td>{{ props.item.invoice_number }}</td>
				<td>{{ props.item.subtotal | formatCurrency }}</td>
				<td>{{ props.item.pst | formatCurrency }}</td>
				<td>{{ props.item.gst | formatCurrency }}</td>
				<td>{{ props.item.total | formatCurrency }}</td>
				<td>
					<v-btn
						left
						block
						flat
						v-show="props.item.sale_type != 'refund'"
						color="error"
						@click="refund(props.item.id)"
					>Refund</v-btn>
				</td>
			</template>
		</v-data-table>
	</v-card>
</template>

<script>
import { mapState } from "vuex";
import Sale from "@/api/endpoints/Sale";
export default {
	data() {
		return {
			headers: [
				{ text: "Invoice", value: "invoice_number" },
				{ text: "Subtotal", value: "subtotal" },
				{ text: "PST", value: "pst" },
				{ text: "GST", value: "gst" },
				{ text: "Total", value: "total" },
				{ text: "Actions", value: "actions", align: "right", width: "1%" }
			]
		};
	},

	methods: {
		async refund(id) {
			const sale = await Sale.get(id);
			let products = sale.data.products;

			for (let index in products) {
				products[index].quantity *= -1;
				products[index].extended *= -1;
				products[index].pst *= -1;
				products[index].gst *= -1;
				products[index].total *= -1;
				this.$store.dispatch("sales/addProduct", products[index]);
			}
			this.$store.commit("sales/SET_SHOW_DIALOG", true);
			this.$store.dispatch("sales/setIsRefund", true);
		}
	},

	computed: {
		...mapState("sales", ["latest"]),
		sales() {
			return Object.values(this.latest);
		}
	}
};
</script>