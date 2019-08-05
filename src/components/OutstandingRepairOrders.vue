<template>
	<v-card>
		<v-card-title>
			<v-spacer></v-spacer>
			<v-text-field v-model="search" append-icon="search" label="Search" single-line hide-details></v-text-field>
			<v-spacer></v-spacer>
		</v-card-title>

		<v-data-table
			:headers="headers"
			:items="repairOrders"
			:search="search"
			disable-initial-sort
		>
			<template v-slot:items="props">
				<td>{{ props.item.order_number }}</td>
				<td>{{ props.item.item}}</td>
				<td>{{ props.item.customer.name}}</td>
				<td>{{ props.item.customer.phone | formatPhoneNumber}}</td>
				<td
					@dblclick="changeDate(props.item.id, props.index, 'to_ho')"
				>{{ props.item.to_ho | formatDateHuman }}</td>
				<td
					@dblclick="changeDate(props.item.id, props.index, 'from_ho')"
				>{{ props.item.from_ho | formatDateHuman }}</td>
				<td
					@dblclick="changeDate(props.item.id, props.index, 'picked_up')"
				>{{ props.item.picked_up | formatDateHuman }}</td>
			</template>
			<template v-slot:no-results>
				<v-alert
					:value="true"
					color="error"
					icon="warning"
				>Your search for "{{ search }}" found no results.</v-alert>
			</template>
			<template v-slot:no-data>
				<v-alert :value="true" color="success" icon="check">
					No outstanding Repair Orders! :)
				</v-alert>
			</template>
		</v-data-table>
	</v-card>
</template>

<script>
import { mapState } from "vuex";
import RepairOrder from "@/api/endpoints/RepairOrder";
import moment from "moment";
export default {
	data() {
		return {
			search: "",
			headers: [
				{ text: "Invoice", value: "order_number" },
				{ text: "Brand", value: "brand" },
				{ text: "Customer", value: "customer.name" },
				{ text: "Phone", value: "customer.phone" },
				{ text: "To HO", value: "to_ho" },
				{ text: "From HO", value: "from_ho" },
				{ text: "Picked Up", value: "picked_up" }
			],
			repairOrders: []
		};
	},

	async beforeMount() {
		await this.getRepairOrders();
	},

	watch: {
		latest() {
			this.getRepairOrders();
		}
	},

	methods: {
		async getRepairOrders() {
			const orders = await RepairOrder.getOutstanding({ with: "customer" });
			if (orders.status == 200) {
				this.repairOrders = orders.data.data;
			} else {
				// flash error
			}
		},

		changeDate(id, index, field) {
			const date = new Date();
			this.repairOrders[index][field] = date.toISOString();

			const data = new Object();
			data[field] = moment(date).format("YYYY-MM-DD HH:mm:ss");

			const resp = RepairOrder.put(id, data);

			if (resp.status == 200) {
				//flash success
			} else {
				//flash error
			}
		}
	},

	computed: {
		...mapState("repairOrders", ["latest"])
	}
};
</script>