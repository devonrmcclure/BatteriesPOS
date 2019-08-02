<template>
	<v-card>

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
					<v-btn flat color="info" @click="showHistory(props.item.sku)">Sales History</v-btn>
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

		<product-sale-history/>
	</v-card>
</template>

<script>
import { mapState } from "vuex";
import Inventory from "@/api/endpoints/Inventory";
import ProductSaleHistory from "./ProductSaleHistory";
export default {
	components: {
		ProductSaleHistory
	},
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
			const products = await Inventory.get();
			if (products.status == 200) {
				this.products = products.data.data;
			} else {
				// flash error
			}
		},

		async showHistory(sku) {
			const product = await Inventory.get(sku, {with: 'sales'});

			if (product.status == 200) {
				this.$store.commit('products/SET_HISTORY_PRODUCT', product.data);
				this.$store.commit('products/SET_SHOW_HISTORY', true);
			} else {
				console.log('oops');
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