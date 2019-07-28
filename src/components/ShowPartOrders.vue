<template>
	<v-card>
		<v-card-title>
			<v-spacer></v-spacer>
			<v-text-field v-model="search" append-icon="search" label="Search" single-line hide-details></v-text-field>
			<v-spacer></v-spacer>
		</v-card-title>
		<v-data-table
			:headers="headers"
			:items="partOrders"
			:search="search"
			class="elevation-1"
			disable-initial-sort
		>
			<template v-slot:items="props">
				<td>{{ props.item.order_number }}</td>
				<td>{{ props.item.brand }}</td>
				<td>{{ props.item.model}}</td>
				<td>{{ props.item.item}}</td>
				<td>{{ props.item.customer.name}}</td>
				<td>{{ props.item.customer.phone | formatPhoneNumber}}</td>
				<td
					@dblclick="changeDate(props.item.id, props.index, 'to_ho')"
				>{{ props.item.to_ho | formatDate }}</td>
				<td
					@dblclick="changeDate(props.item.id, props.index, 'from_ho')"
				>{{ props.item.from_ho | formatDate }}</td>
				<td
					@dblclick="changeDate(props.item.id, props.index, 'picked_up')"
				>{{ props.item.picked_up | formatDate }}</td>
				<td><v-btn color="info" flat>view</v-btn> <v-btn color="error" flat>void</v-btn></td>
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
import PartOrder from "@/api/endpoints/PartOrder";
import moment from 'moment';
export default {
	data() {
		return {
			search: "",
			headers: [
				{ text: "Invoice", value: "order_number" },
				{ text: "Brand", value: "brand" },
				{ text: "Model", value: "model" },
				{ text: "Item", value: "item" },
				{ text: "Customer", value: "customer.name" },
				{ text: "Phone", value: "customer.phone" },
				{ text: "To HO", value: "to_ho" },
				{ text: "From HO", value: "from_ho" },
				{ text: "Picked Up", value: "picked_up" },
				{ text: "", value: null }
			],
			partOrders: []
		};
	},

	async beforeMount() {
		await this.getPartOrders();
	},

	watch: {
		latest() {
			this.getPartOrders();	
		}
	},

	methods: {
		async getPartOrders() {
			const orders = await PartOrder.get(undefined, { with: "customer" });
			if (orders.status == 200) {
				this.partOrders = orders.data.data;
			} else {
				// flash error
			}
		},
		
		changeDate(id, index, field) {
			console.log(id);
			const date = new Date();
			this.partOrders[index][field] = date.toISOString();

			const data = new Object();
			data[field] = moment(date).format('YYYY-MM-DD HH:mm:ss');
	
			const resp = PartOrder.put(id, data);

			if (resp.status == 200) {
				//flash success
			} else {
				//flash error
			}
		}
	},

	computed: {
		...mapState('partOrders', ['latest'])
	}
};
</script>