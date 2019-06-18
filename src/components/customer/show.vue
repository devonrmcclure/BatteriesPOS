<template>
	<div>
		<p class="title">
			{{customer.name}}
			<small>
				<em>{{customer.phone}}</em>
			</small>
		</p>

		<p></p>
		<p>{{customer.address}}</p>

		<v-text-field
			v-model="search"
			name="search"
			label="Customer Search"
			@change="searchCustomer"
		>input</v-text-field>
	</div>
</template>

<script>
import { mapState } from "vuex";
import Customer from "@/api/endpoints/Customer";
export default {
	data() {
		return {
			search: ""
		};
	},
	computed: {
		...mapState("customers", ["customer"])
	},
	methods: {
		async searchCustomer() {
			const customer = await Customer.get(this.search);
			if (customer.status == 200) {
				this.$store.dispatch(
					"customers/setCustomer",
					customer.data.attributes
				);
			}
		}
	}
};
</script>
