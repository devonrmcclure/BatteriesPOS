<template>
	<v-dialog v-model="showDialog" persistent full-width origin="top center">
		<v-toolbar dark color="primary">
			<v-toolbar-title class="white--text">Part Order #{{ orderNumber }}</v-toolbar-title>
			<v-spacer></v-spacer>
			<v-text-field
				flat
				solo-inverted
				hide-details
				prepend-inner-icon="search"
				label="Add Product By Sku..."
				class="hidden-sm-and-down"
				v-model="search"
				@change="getProduct()"
			></v-text-field>
			<v-spacer></v-spacer>
		</v-toolbar>

		<v-card>
			<v-card-text>
				<v-layout row wrap>
					<v-flex xs9>
						<ul v-for="product in products" :key="product.sku">
							<li>{{product.sku}}: {{product.description | trim }}</li>
						</ul>
						Br
					</v-flex>

					<v-flex xs3>
						<v-flex d-flex ma-3>
							<customer></customer>
						</v-flex>
					</v-flex>
				</v-layout>
			</v-card-text>

			<v-card-actions>
				<v-spacer></v-spacer>
				<v-btn large color="success" @click="savePartOrder">Save</v-btn>
				<v-btn large color="info" @click="newSale">Sale</v-btn>
				<v-btn large color="error" @click="cancelPartOrder">Cancel</v-btn>
				<v-spacer></v-spacer>
			</v-card-actions>
		</v-card>
	</v-dialog>
</template>

<script>
// @ is an alias to /src
import { mapState, mapGetters } from "vuex";
import Product from "@/api/endpoints/Product";
import Sale from "@/api/endpoints/Sale";
import customerShow from "@/components/customer/show.vue";
export default {
	components: {
		customer: customerShow
	},
	data() {
		return {
			search: "",
			products: []
		};
	},
	computed: {
		...mapState("partOrders", ["orderNumber", "showDialog"]),
		...mapState("customers", ["customer"])
	},

	methods: {
		resetForm() {
			this.products = [];
			this.$store.dispatch("sales/init"); // re-init latest sales.
			this.$store.dispatch("partOrders/init"); // re-init latest partOrders.
			this.$store.dispatch("customers/init"); // re-init default cust.
			this.$store.dispatch("sales/clearProducts");
			this.$store.dispatch("sales/setIsRefund", false);
		},
		cancelPartOrder() {
			this.resetForm();
			this.$store.commit("partOrders/SET_SHOW_DIALOG", false);
		},
		newSale() {
			for (let index in this.products) {
				this.$store.dispatch("sales/addProduct", this.products[index]);
			}
			this.$store.commit("sales/SET_SHOW_DIALOG", true);
			this.$store.dispatch("sales/setIsPartOrder", true);
		},
		async getProduct() {
			// check if item exists in sale already.
			const found = this.products.find(item => {
				return item.sku == this.search;
			});

			if (found) {
				this.search = "";
				return;
			}

			let product = this.$store.state.products.common
				.filter(product => {
					return product.sku == this.search;
				})
				.pop(); // remove the silly [] wrapping.
			if (!product) {
				const data = await Product.get(this.search);
				if (data.status != 200) {
					// Error on fetching.
					this.search = "";
					return false;
				}

				product = data.data;
			}

			this.products.push(product);

			this.search = "";
		},

		savePartOrder() {
			if (this.$store.state.customers.customer.type == "default") {
				console.log("change cust!");
			}
		}
	},
	filters: {
		trim(item) {
			const trimmed = item.slice(0, 30);
			return trimmed + (trimmed.length < item.length ? "..." : "");
		}
	}
};
</script>

<style scoped>
</style>
