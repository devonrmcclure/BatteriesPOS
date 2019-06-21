<template>
	<div>
		<p class="title">
			{{customer.name}}
			<small>
				<em>{{customer.phone | formatPhoneNumber}}</em>
			</small>
		</p>

		<p></p>
		<p>{{customer.address}}</p>

		<v-text-field
			v-model="newCustomer.phone"
			name="search"
			label="Customer Search"
			@change="searchCustomer"
		>input</v-text-field>

		<v-dialog v-model="dialog" persistent width="500">
			<v-card>
				<v-card-title class="headline grey lighten-2" primary-title>Add New Customer</v-card-title>

				<ul v-if="errors">
					<li v-for="error in errors" :key="error">{{error}}</li>
				</ul>

				<v-card-text>
					<v-text-field
						v-model="newCustomer.name"
						name="name"
						label="Name"
						:rules="[rules.required]"
					>input</v-text-field>
					<v-text-field
						v-model="newCustomer.phone"
						name="phone"
						label="Phone"
						minlength="10"
						maxlength="10"
						counter
						:rules="[rules.required, rules.counter]"
					>input</v-text-field>
					<v-text-field v-model="newCustomer.address" name="address" label="Address (optional)">input</v-text-field>
					<v-text-field v-model="newCustomer.email" name="email" label="Email (optional)">input</v-text-field>
				</v-card-text>

				<v-divider></v-divider>

				<v-card-actions>
					<v-spacer></v-spacer>
					<v-btn color="red darken-1" flat @click="dialog = false">Cancel</v-btn>
					<v-btn color="green darken-1" flat @click="addCustomer">Add</v-btn>
				</v-card-actions>
			</v-card>
		</v-dialog>
	</div>
</template>

<script>
import { mapState } from "vuex";
import Customer from "@/api/endpoints/Customer";
export default {
	data() {
		return {
			dialog: false,
			newCustomer: {
				name: "",
				phone: "",
				address: "",
				email: ""
			},
			errors: [],
			rules: {
				required: value => !!value || "Required.",
				counter: value => value.length <= 10 || "Max 10 characters",
				email: value => {
					const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
					return pattern.test(value) || "Invalid e-mail.";
				}
			}
		};
	},
	computed: {
		...mapState("customers", ["customer"])
	},
	methods: {
		async searchCustomer() {
			const customer = await Customer.get(this.newCustomer.phone);
			if (customer.status == 200) {
				this.$store.dispatch(
					"customers/setCustomer",
					customer.data.attributes
				);
				this.newCustomer.phone = "";
			} else {
				this.dialog = true;
			}
		},

		async addCustomer() {
			const customer = await Customer.post(this.newCustomer);

			if (customer.status == 201) {
				this.$store.dispatch(
					"customers/setCustomer",
					customer.data.attributes
				);
				this.dialog = false;
				this.newCustomer.phone = "";
				this.newCustomer.name = "";
				this.newCustomer.email = "";
				this.newCustomer.address = "";
			} else {
				//do something with errors heh.
				this.errors = customer.error;
				console.log(customer.error);
			}
		}
	}
};
</script>
