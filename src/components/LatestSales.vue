<template>
	<div>
		<v-toolbar-title class="text-xs-left">Last 5 Sales</v-toolbar-title>
		<v-data-table
			:headers="headers"
			:items="sales"
			class="elevation-1"
			hide-actions
			disable-initial-sort
		>
			<template v-slot:items="props">
				<td class="text-xs-right">{{ props.item.invoice_number }}</td>
				<td class="text-xs-right">{{ props.item.subtotal | formatCurrency }}</td>
				<td class="text-xs-right">{{ props.item.pst | formatCurrency }}</td>
				<td class="text-xs-right">{{ props.item.gst | formatCurrency }}</td>
				<td class="text-xs-right">{{ props.item.total | formatCurrency }}</td>
				<td class="text-xs-right">
					<v-btn v-show="props.item.sale_type != 'refund'" color="error" @click="refund(props.item.id)">Refund</v-btn>
				</td>
			</template>
		</v-data-table>
	</div>
</template>

<script>
import { mapState } from "vuex";
import Sale from "@/api/endpoints/Sale";
export default {
	data() {
		return {
			headers: [
				{ text: "Invoice", value: "invoiceNumber", align: "center" },
				{ text: "Subtotal", value: "subtotal", align: "center" },
				{ text: "PST", value: "pst", align: "center" },
				{ text: "GST", value: "gst", align: "center" },
				{ text: "Total", value: "total", align: "center" },
				{ text: "Actions", value: "actions", align: "center" }
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