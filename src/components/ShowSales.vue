<template>
	<v-card>
		<v-card-title>
			<v-spacer></v-spacer>
			<v-text-field v-model="search" append-icon="search" label="Search" single-line hide-details></v-text-field>
			<v-spacer></v-spacer>
		</v-card-title>

		<v-data-table
			:headers="headers"
			:items="sales"
			:search="search"
			hide-actions
			disable-initial-sort
		>
			<template v-slot:items="props">
				<td>{{ props.item.invoice_number }}</td>
				<td>{{ props.item.subtotal | formatCurrency }}</td>
				<td>{{ props.item.pst | formatCurrency }}</td>
				<td>{{ props.item.gst | formatCurrency }}</td>
				<td>{{ props.item.total | formatCurrency }}</td>
				<td>{{ props.item.sale_type }}</td>
				<td>{{ props.item.customer.name }}</td>
				<td class="text-xs-right">
					<v-btn
						flat
						v-show="props.item.sale_type != 'refund'"
						color="error"
						@click="refund(props.item.id)"
					>Refund</v-btn>
					<v-btn flat color="info">View</v-btn>
				</td>
			</template>
			<template v-slot:no-results>
				<v-alert
					:value="true"
					color="error"
					icon="warning"
				>Your search for "{{ search }}" found no results.</v-alert>
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
			search: "",
			headers: [
				{ text: "Invoice", value: "invoice_number" },
				{ text: "Subtotal", value: "subtotal" },
				{ text: "PST", value: "pst" },
				{ text: "GST", value: "gst" },
				{ text: "Total", value: "total" },
				{ text: "Type", value: "sale_type" },
				{ text: "Customer", value: "customer.name" },
				{ text: "Actions", value: "actions", align: 'center' }
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
		...mapState("sales", ["history"]),
		sales() {
			return Object.values(this.history);
		}
	}
};
</script>