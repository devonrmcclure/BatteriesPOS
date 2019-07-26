<template>
	<v-dialog v-model="showDialog" persistent full-width origin="top center">
		<v-toolbar dark color="primary">
			<v-toolbar-title class="white--text">Part Order #{{ orderNumber }}</v-toolbar-title>
			<v-spacer></v-spacer>
			<v-text-field
				flat
				solo-inverted
				prepend-inner-icon="search"
				label="Add Product By Sku..."
				class="hidden-sm-and-down"
				v-model="search"
				@change="getProduct()"
			></v-text-field>
			<v-spacer></v-spacer>
		</v-toolbar>

		<v-card>
			<v-alert :value="error.show" type="error">{{error.message}}</v-alert>
			<v-card-text>
				<v-layout row wrap>
					<v-flex xs9>
						<v-form ref="form" v-model="valid" lazy-validation>
							<v-layout>
								<v-flex xs4>
									<v-text-field
										flat
										label="Brand (eg. Samsung)"
										class="hidden-sm-and-down"
										v-model="brand"
										:rules="required"
									></v-text-field>
								</v-flex>
								<v-flex xs4 ml-4 mr-4>
									<v-text-field
										flat
										label="Model (eg. Galaxy S9)"
										class="hidden-sm-and-down"
										v-model="model"
										:rules="required"
									></v-text-field>
								</v-flex>
								<v-flex xs4>
									<v-text-field
										flat
										label="Item (eg. Cell Phone Battery)"
										class="hidden-sm-and-down"
										v-model="item"
										:rules="required"
									></v-text-field>
								</v-flex>
							</v-layout>

							<v-layout>
								<v-flex xs3 mr-4>
									<v-text-field
										flat
										label="Part Number"
										class="hidden-sm-and-down"
										v-model="partNumber"
										:rules="required"
									></v-text-field>
								</v-flex>

								<v-flex xs9>
									<v-text-field
										flat
										label="Part Description"
										class="hidden-sm-and-down"
										v-model="partDescription"
										:rules="required"
									></v-text-field>
								</v-flex>
							</v-layout>

							<v-textarea flat label="Notes" class="hidden-sm-and-down" v-model="notes"></v-textarea>
						</v-form>
						<v-data-table
							:headers="headers"
							:items="products"
							class="elevation-3"
							disable-initial-sort
							hide-actions
						>
							<template v-slot:items="props">
								<td class="text-xs-left" @click="removeItem(props.index)">
									<v-tooltip bottom>
										<template v-slot:activator="{ on }">
											<v-btn flat icon color="red" v-on="on">
												<v-icon>clear</v-icon>
											</v-btn>
										</template>
										<span>Remove Product</span>
									</v-tooltip>
								</td>
								<td class="text-xs-left">{{ props.item.sku }}</td>
								<td class="text-xs-left">{{ props.item.description }}</td>
								<td class="text-xs-left">
									<v-text-field v-model="props.item.price" name="Price"></v-text-field>
								</td>
								<td class="text-xs-left edit">
									<v-text-field v-model="props.item.quantity" name="Qty"></v-text-field>
								</td>
							</template>
						</v-data-table>
					</v-flex>

					<v-flex xs3>
						<v-flex d-flex ml-3 mr-3>
							<v-form ref="form2" v-model="valid" lazy-validation>
								<v-select :items="referTypes" label="Referred By" v-model="referredBy" :rules="required"></v-select>
							</v-form>
						</v-flex>
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
import { mapState } from "vuex";
import Product from "@/api/endpoints/Product";
import PartOrder from "@/api/endpoints/PartOrder";
import customerShow from "@/components/customer/show.vue";
export default {
	components: {
		customer: customerShow
	},
	data() {
		return {
			valid: true,
			search: "",
			referredBy: "",
			brand: "",
			model: "",
			item: "",
			partNumber: "",
			partDescription: "",
			notes: "",
			products: [],
			referTypes: ["Walk In", "Warranty"],
			required: [v => !!v || "Field is Required"],
			headers: [
				{ text: "", value: "", align: "left" },
				{ text: "Sku", value: "sku", align: "left" },
				{ text: "Description", value: "description", align: "left" },
				{ text: "Price", value: "price", align: "left" },
				{ text: "Qty", value: "qty", align: "left", width: "string" }
			]
		};
	},
	computed: {
		...mapState(["error"]),
		...mapState("partOrders", ["orderNumber", "showDialog", "partOrderID"]),
		...mapState("customers", ["customer"])
	},

	methods: {
		validate() {
			if (!this.$refs.form.validate()) {
				return false;
			}
			if (!this.$refs.form2.validate()) {
				return false;
			}

			return true;
		},
		resetForm() {
			this.products = [];
			this.$store.dispatch("sales/init"); // re-init latest sales.
			this.$store.dispatch("partOrders/init"); // re-init latest partOrders.
			this.$store.dispatch("customers/init"); // re-init default cust.
			this.$store.dispatch("sales/clearProducts");
			this.$store.dispatch("sales/setIsRefund", false);
			(this.products = []),
				this.$refs.form.reset(),
				this.$refs.form2.reset();
		},
		cancelPartOrder() {
			this.resetForm();
			this.$store.commit("partOrders/SET_SHOW_DIALOG", false);
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
</style>
