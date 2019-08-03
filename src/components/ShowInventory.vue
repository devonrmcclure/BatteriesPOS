<template>
	<v-card>
		<v-card-title>
			<v-spacer></v-spacer>
			<v-text-field v-model="search" append-icon="search" label="Search" single-line hide-details></v-text-field>
			<v-spacer></v-spacer>
		</v-card-title>
		<v-data-table :headers="headers" :items="products" :search="search" disable-initial-sort>
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

		<product-sale-history />
	</v-card>
</template>

<script>
import { mapState } from "vuex";
import Inventory from "@/api/endpoints/Inventory";
import ProductSaleHistory from "./ProductSaleHistory";
import Cache from "@/helpers/Cache";
export default {
	components: {
		ProductSaleHistory
	},
	data() {
		return {
			search: "",
			headers: [
				{ text: "Sku", value: "sku", width: "1%" },
				{ text: "Description", value: "description" },
				{ text: "Price (plus tax)", value: "price", width: "1%" },
				{ text: "Brand", value: "brand" },
				{ text: "Manufacturer", value: "manufacturer" },
				{ text: "Model Number", value: "model_number", width: "1%" },
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
			let products = Cache.isCached("inventory").data;

			if (!products) {
				products = await Inventory.get();
				products = products.data.data;
				Cache.setCache("inventory", products);
			}

			this.products = products;
		},

		async showHistory(sku) {
			const product = await Inventory.get(sku, { with: "sales" });

			if (product.status == 200) {
				this.$store.commit(
					"products/SET_HISTORY_PRODUCT",
					product.data
				);
				this.$store.commit("products/SET_SHOW_HISTORY", true);
			} else {
				console.log("oops");
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