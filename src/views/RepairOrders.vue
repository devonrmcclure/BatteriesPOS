<template>
	<v-layout row wrap>
		<v-flex xs12>
			<v-toolbar-title class="text-xs-left">Repair Orders</v-toolbar-title>
				<show-repair-orders></show-repair-orders>
		</v-flex>
	</v-layout>
</template>

<script>
// @ is an alias to /src
import ShowRepairOrders from "@/components/ShowRepairOrders.vue";
export default {
	components: {
		ShowRepairOrders
	},
	data() {
		return {
		};
	},
	computed: {},
	methods: {}
};
</script>
