<template>
	<v-card>
		<v-card-title>
			<v-spacer></v-spacer>
			<v-text-field v-model="search" append-icon="search" label="Search" single-line hide-details></v-text-field>
			<v-spacer></v-spacer>
		</v-card-title>

		<v-data-table
			:headers="headers"
			:items="products"
			:search="search"
			hide-actions
			disable-initial-sort
		>
			<template v-slot:items="props">
				<td>{{ props.item.sku }}</td>
				<td>{{ props.item.description }}</td>
				<td>{{ props.item.price | formatCurrency }}</td>
				<td>{{ props.item.brand }}</td>
				<td>{{ props.item.manufacturer }}</td>
				<td>{{ props.item.model }}</td>
				<td class="text-xs-right">
					<v-btn flat color="info">Sales History</v-btn>
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
import Inventory from "@/api/endpoints/Inventory";
export default {
	data() {
		return {
			search: "",
			headers: [
				{ text: "Sku", value: "sku" },
				{ text: "Description", value: "description" },
				{ text: "Price (plus tax)", value: "price" },
				{ text: "Brand", value: "brand" },
				{ text: "Manufacturer", value: "manufacturer" },
				{ text: "Model Number", value: "model_number" },
				{ text: "Actions", value: "actions", align: "center" }
			],
			products: []
		};
	},
	beforeMount() {
		this.getProducts();
	},

	methods: {
		async getProducts() {
			const orders = await Inventory.get();
			if (orders.status == 200) {
				this.products = orders.data.data;
			} else {
				// flash error
			}
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