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
							<v-flex xs10>
								<v-data-table
									:headers="headers"
									:items="sale.products"
									class="elevation-3"
									disable-initial-sort
								>
									<template v-slot:no-data>
										<v-alert :value="true" color="info" outline icon="warning">Add a Product!</v-alert>
									</template>
									<template v-slot:items="props">
										<td class="text-xs-left">{{ props.item.sku }}</td>
										<td class="text-xs-left">{{ props.item.description | trim }}</td>
										<td class="text-xs-left">{{ props.item.price | formatCurrency }}</td>
										<td class="text-xs-left edit">
											<v-text-field v-model="props.item.qty" name="Qty" @change="update(props.index)"></v-text-field>
										</td>
										<td class="text-xs-left">{{ props.item.extended | formatCurrency}}</td>
										<td class="text-xs-left">{{ props.item.pst | formatCurrency}}</td>
										<td class="text-xs-left">{{ props.item.gst | formatCurrency}}</td>
										<td class="text-xs-left">{{ props.item.total | formatCurrency}}</td>
									</template>
									<template v-slot:footer>
										<td :colspan="headers.length">
											<v-btn color="success">CASH</v-btn>
											<v-btn color="info">DEBIT</v-btn>
											<v-btn color="warning">MASTERCARD</v-btn>
											<v-btn color="error">VISA</v-btn>
											<v-btn color="info">OTHER</v-btn>
										</td>
									</template>
								</v-data-table>
							</v-flex>
							<v-flex xs2>
								<p>SUBTOTAL: {{saleSubTotal | formatCurrency}}</p>
								<p>
									PST: {{salePstTotal | formatCurrency}}
									<small>7%</small>
								</p>
								<p>
									GST: {{saleGstTotal | formatCurrency}}
									<small>5%</small>
								</p>
								<p>TOTAL: {{saleTotal | formatCurrency}}</p>
								<p>TOTAL ITEMS SOLD: {{itemsSold}}</p>
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
export default {
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
			sale: {
				invoice_number: this.nextInvoice,
				subtotal: "",
				pst: "",
				gst: "",
				items_sold: "",
				invoice_comment: "",
				printed: "",
				staff_id: "",
				customer_id: "",
				payment_method: "",
				part_order_id: "",
				repair_order_id: "",
				products: []
			}
		};
	},

	computed: {
		...mapState("sales", ["nextInvoice"]),
		saleTotal() {
			let total = 0;
			for (let product in this.sale.products) {
				total += this.sale.products[product].total;
			}

			return total;
		},
		salePstTotal() {
			let total = 0;
			for (let product in this.sale.products) {
				total += this.sale.products[product].pst;
			}

			return total;
		},
		saleGstTotal() {
			let total = 0;
			for (let product in this.sale.products) {
				total += this.sale.products[product].gst;
			}

			return total;
		},
		saleSubTotal() {
			let total = 0;
			for (let product in this.sale.products) {
				total += this.sale.products[product].extended;
			}

			return total;
		},
		itemsSold() {
			let total = 0;
			for (let product in this.sale.products) {
				total += Number(this.sale.products[product].qty);
			}

			return total;
		}
	},

	methods: {
		update(index) {
			let extended =
				this.sale.products[index].price * this.sale.products[index].qty;
			let pst =
				(extended * 0.07).toFixed(0) * this.sale.products[index].is_pst;
			let gst =
				(extended * 0.05).toFixed(0) * this.sale.products[index].is_gst;
			let total = extended + pst + gst;
			let editedItem = {
				...this.sale.products[index],
				...{
					extended,
					pst,
					gst,
					total
				}
			};
			this.sale.products.splice(index, 1, editedItem);
		},
		async getProduct() {
			// check if item exists in sale already.
			const found = this.sale.products.find(item => {
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
			product.qty = 1;
			product.extended = product.price * product.qty;
			product.pst = (product.extended * 0.07).toFixed(0) * product.is_pst;
			product.gst = (product.extended * 0.05).toFixed(0) * product.is_gst;
			product.total = product.extended + product.pst + product.gst;
			this.sale.products.push(product);

			this.search = "";
		},
		addCustomer() {
			alert("Not implemented!");
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
