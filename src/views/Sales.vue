<template>
	<v-container grid-list-md>
		<v-layout row wrap>
			<v-flex xs12>
				<!-- <v-btn @click="dialog = !dialog">Click!</v-btn>
				<v-dialog v-model="dialog" max-width="1200px">
					<v-card>hi</v-card>
				</v-dialog>-->
				<v-toolbar dark color="primary">
					<v-toolbar-title class="white--text">Sale #{{ nextInvoice }}</v-toolbar-title>
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
					<v-toolbar-items class="hidden-sm-and-down">
						<v-btn flat @click="addCustomer()">Add Customer</v-btn>
					</v-toolbar-items>
				</v-toolbar>
				<v-card>
					<v-card-text>
						<v-layout row wrap>
							<v-flex xs9>
								<v-data-table :headers="headers" :items="products" class="elevation-3" disable-initial-sort>
									<template v-slot:items="props">
										<td class="text-xs-left">{{ props.item.sku }}</td>
										<td class="text-xs-left">{{ props.item.description | trim }}</td>
										<td class="text-xs-left">{{ props.item.price | formatCurrency }}</td>
										<td class="text-xs-left edit">
											<v-text-field v-model="props.item.quantity" name="Qty" @change="update(props.index)"></v-text-field>
										</td>
										<td class="text-xs-left">{{ props.item.extended | formatCurrency}}</td>
										<td class="text-xs-left">{{ props.item.pst | formatCurrency}}</td>
										<td class="text-xs-left">{{ props.item.gst | formatCurrency}}</td>
										<td class="text-xs-left">{{ props.item.total | formatCurrency}}</td>
									</template>
									<template v-slot:footer>
										<td :colspan="headers.length">
											<v-btn
												v-for="method in paymentMethods"
												v-bind:key="method.index"
												color="success"
												@click="completeSale(method.id)"
											>{{method.name}}</v-btn>
										</td>
									</template>
								</v-data-table>
							</v-flex>
							<v-flex xs3>
								<customer class="elevation-3 pa-2"></customer>
							</v-flex>

							<v-flex xs2>
								<p>SUBTOTAL: {{saleSubTotal | formatCurrency}}</p>
								<p>
									PST: {{salePstTotal | formatCurrency}}
									<small>{{PST_RATE}}%</small>
								</p>
								<p>
									GST: {{saleGstTotal | formatCurrency}}
									<small>{{GST_RATE}}%</small>
								</p>
								<p>TOTAL: {{saleTotal | formatCurrency}}</p>
							</v-flex>
						</v-layout>
					</v-card-text>
				</v-card>
			</v-flex>
		</v-layout>
	</v-container>
</template>

<script>
// @ is an alias to /src
import { mapState } from "vuex";
import Product from "@/api/endpoints/Product";
import Sale from "@/api/endpoints/Sale";
import customerShow from "@/components/customer/show.vue";
export default {
	components: {
		customer: customerShow
	},
	data() {
		return {
			headers: [
				{ text: "Sku", value: "sku", align: "left" },
				{ text: "Description", value: "description", align: "left" },
				{ text: "Price", value: "price", align: "left" },
				{ text: "Qty", value: "qty", align: "left", width: "string" },
				{ text: "Extended", value: "extended", align: "left" },
				{ text: "PST", value: "pst", align: "left" },
				{ text: "GST", value: "gst", align: "left" },
				{ text: "Total", value: "total", align: "left" }
			],
			search: "",
			products: []
		};
	},

	computed: {
		...mapState("sales", ["nextInvoice"]),
		...mapState(["paymentMethods"]),
		...mapState("customers", ["customer"]),
		...mapState("settings", ["PST_RATE", "GST_RATE"]),
		saleTotal() {
			let total = 0;
			for (let product in this.products) {
				total += this.products[product].total;
			}

			return total;
		},
		salePstTotal() {
			let total = 0;
			for (let product in this.products) {
				total += this.products[product].pst;
			}

			return total;
		},
		saleGstTotal() {
			let total = 0;
			for (let product in this.products) {
				total += this.products[product].gst;
			}

			return total;
		},
		saleSubTotal() {
			let total = 0;
			for (let product in this.products) {
				total += this.products[product].extended;
			}
			return total;
		},
		itemsSold() {
			let total = 0;
			for (let product in this.products) {
				total += Number(this.products[product].quantity);
			}

			return total;
		}
	},

	methods: {
		update(index) {
			let extended =
				this.products[index].price * this.products[index].quantity;
			let pst =
				(extended * (this.PST_RATE / 100)).toFixed(0) *
				this.products[index].is_pst;
			let gst =
				(extended * (this.GST_RATE / 100)).toFixed(0) *
				this.products[index].is_gst;
			let total = extended + pst + gst;
			let editedItem = {
				...this.products[index],
				...{
					extended,
					pst,
					gst,
					total
				}
			};
			this.products.splice(index, 1, editedItem);
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

				product = data.data.attributes;
				// add product to product store.
				this.$store.dispatch("products/addCommonProduct", product);
			}
			product.quantity = 1;
			product.extended = product.price * product.quantity;
			product.pst =
				(product.extended * (this.PST_RATE / 100)).toFixed(0) *
				product.is_pst;
			product.gst =
				(product.extended * (this.GST_RATE / 100)).toFixed(0) *
				product.is_gst;
			product.total = product.extended + product.pst + product.gst;

			this.products.push(product);

			this.search = "";
		},

		addCustomer() {
			alert("Not implemented!");
		},

		async completeSale(methodId) {
			const data = {
				invoice_number: this.nextInvoice,
				subtotal: this.saleSubTotal,
				pst: this.salePstTotal,
				gst: this.saleGstTotal,
				total: this.saleTotal,
				items_sold: this.itemsSold,
				invoice_comment: "meow",
				printed: 0,
				staff_id: 1,
				customer_id: this.customer.id,
				payment_method: methodId,
				part_order_id: null,
				repair_order_id: null,
				sale_type: "regular",
				products: this.products
			};
			if (data.products.length <= 0) {
				console.log("empty products");
				return;
			}
			const sale = await Sale.post(data);
			if (sale.status == 200) {
				this.products = [];
				this.$store.dispatch("sales/init"); // re-init latest sales.
				this.$store.dispatch("customers/init"); // re-init default cust.
			} else {
				console.log(sale.error);
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
.edit {
	max-width: 5px;
}
</style>
