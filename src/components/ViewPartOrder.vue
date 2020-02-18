<template>
	<v-dialog v-model="viewPartOrderDialog" persistent full-width origin="top center">
		<v-toolbar dark color="primary">
			<v-toolbar-title class="white--text">Part Order #{{ viewPartOrderNum }}</v-toolbar-title>
			<v-spacer></v-spacer>
		</v-toolbar>

		<v-card>
			<v-alert :value="error.show" type="error">{{error.message}}</v-alert>
			<v-card-text>
				<v-layout row wrap>
					<v-flex xs8>
						<table class="poTable">
							<thead>
								<th>Referred By</th>
								<th>Brand</th>
								<th>Model</th>
								<th>Item</th>
								<th>Part Number</th>
								<th>Part Description</th>
								<th>To HO</th>
								<th>From HO</th>
								<th>Picked Up</th>
							</thead>
							<tbody>
								<tr>
									<td>{{ partOrder.referred_by }}</td>
									<td>{{ partOrder.brand }}</td>
									<td>{{ partOrder.model }}</td>
									<td>{{ partOrder.item }}</td>
									<td>{{ partOrder.part_number }}</td>
									<td>{{ partOrder.part_description }}</td>
									<td @dblclick="changeDate('to_ho')">{{ partOrder.to_ho | formatDateISO }}</td>
									<td @dblclick="changeDate('from_ho')">{{ partOrder.from_ho | formatDateISO }}</td>
									<td @dblclick="changeDate('picked_up')">{{ partOrder.picked_up | formatDateISO }}</td>
								</tr>
							</tbody>
						</table>
						<br />
						<h2>Sales</h2>
						<table class="poTable" v-for="sale of partOrder.sales" :key="sale.invoice">
							<thead>
								<th>Sale Invoice</th>
								<th>Sku</th>
								<th>Description</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Extended</th>
								<th>PST</th>
								<th>GST</th>
								<th>Total</th>
							</thead>
							<tbody>
								<tr v-for="product of sale.products" :key="product.sku">
									<td>{{ sale.invoice_number}}</td>
									<td>{{ product.sku }}</td>
									<td>{{ product.description }}</td>
									<td>{{ product.price | formatCurrency }}</td>
									<td>{{ product.quantity }}</td>
									<td>{{ product.extended | formatCurrency }}</td>
									<td>{{ product.pst | formatCurrency }}</td>
									<td>{{ product.gst | formatCurrency }}</td>
									<td>{{ product.total | formatCurrency }}</td>
								</tr>
							</tbody>
						</table>
					</v-flex>

					<v-flex xs4 text-xs-right>
						<h2>Created On {{ partOrder.created | formatDateHuman }}</h2>
						<p>
							<strong>By:</strong>
							{{ partOrder.staff.initials }}
						</p>
						<p>{{ partOrder.customer.name }}</p>

						<p>{{ partOrder.customer.address }}</p>
						<p>{{ partOrder.customer.phone | formatPhoneNumber }}</p>
					</v-flex>
				</v-layout>
			</v-card-text>
			<v-card-actions>
				<v-btn color="error" @click="closeDialog">Close</v-btn>
			</v-card-actions>
		</v-card>
	</v-dialog>
</template>

<script>
// @ is an alias to /src
import { mapState } from "vuex";
import Product from "@/api/endpoints/Product";
import PartOrder from "@/api/endpoints/PartOrder";
import customerShow from "@/components/customer/show.vue";
import moment from "moment";
export default {
	components: {
		customer: customerShow
	},
	data() {
		return {
			partOrder: {
				staff: {},
				customer: { name: "", address: "", phone: "" },
				sales: {}
			}
		};
	},
	computed: {
		...mapState(["error"]),
		...mapState("partOrders", ["viewPartOrderDialog", "viewPartOrderNum"])
	},

	watch: {
		viewPartOrderNum() {
			if(this.viewPartOrderNum != undefined) {
				this.getPartOrder();
			}
		}
	},

	methods: {
		closeDialog() {
			this.$store.commit("partOrders/SET_VIEW_PART_ORDER_DIALOG", false);
			this.$store.commit(
				"partOrders/SET_VIEW_PART_ORDER_NUMBER",
				undefined
			);
		},
		changeDate(field) {
			const date = new Date();
			this.partOrder[field] = date.toISOString();

			const data = new Object();
			data[field] = moment(date).format("YYYY-MM-DD HH:mm:ss");

			const resp = PartOrder.put(this.partOrder.id, data);

			if (resp.status == 200) {
				//flash success
			} else {
				//flash error
			}
		},
		async getPartOrder() {
			const partOrder = await PartOrder.get(this.viewPartOrderNum, {
				with: "customer,sales.products,staff"
			});

			if (partOrder.status == 200) {
				this.partOrder = partOrder.data;
				this.$store.dispatch(
					"customers/setCustomer",
					partOrder.data.customer
				);
			} else {
				this.$store.commit("SET_ERROR_STATE", {
					show: true,
					message: partOrder.error
				});
			}
		},
		async newSale() {
			if ((await this.createPartOrder()) == true) {
				for (let index in this.products) {
					this.products[index].price = String(
						this.products[index].price
					).replace(".", "");
					this.$store.dispatch(
						"sales/addProduct",
						this.products[index]
					);
				}
				this.$store.commit("sales/SET_PART_ORDER_ID", this.partOrderID);
				this.$store.commit("sales/SET_SHOW_DIALOG", true);
				this.$store.dispatch("sales/setIsPartOrder", true);
			} else {
				console.log("wat");
			}
		},
		removeItem(index) {
			this.products.splice(index, 1);
		},

		async savePartOrder() {
			if ((await this.createPartOrder()) == true) {
				this.$store.commit("partOrders/SET_SHOW_DIALOG", false);
				this.resetForm();
			}
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

			product.quantity = 1;
			this.products.push(product);

			this.search = "";
		},

		async createPartOrder() {
			if (!this.validate()) {
				// fix yo errors!
				return false;
			}

			const data = {
				order_number: this.orderNumber,
				referred_by: this.referredBy,
				brand: this.brand,
				model: this.model,
				item: this.item,
				part_number: this.partNumber,
				part_description: this.partDescription,
				notes: this.notes,
				staff_id: 1,
				customer_id: this.customer.id
			};

			const partOrder = await PartOrder.post(data);

			if (partOrder.status == 201 || partOrder.status == 200) {
				return true;
			} else {
				console.log(partOrder.status);
				console.log(partOrder.error[0]);
				return false;
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
.poTable {
	width: 100%;
}

.poTable th {
	text-align: left;
	font-size: 1.3em;
}
</style>
