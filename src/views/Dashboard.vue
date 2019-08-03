<template>
	<v-layout row wrap>
		<v-flex xs12>
			<v-toolbar-title class="text-xs-left">Outstanding Repair Orders <small>(oldest first)</small></v-toolbar-title>
			<v-card>
				<outstanding-repair-orders />
			</v-card>
		</v-flex>
		<v-flex xs7>
			<v-toolbar-title class="text-xs-left">Outstanding Part Orders <small>(oldest first)</small></v-toolbar-title>
			<v-card>
				<outstanding-part-orders />
			</v-card>
		</v-flex>
		<v-flex xs5>
			<v-toolbar-title class="text-xs-left">Last 5 Sales</v-toolbar-title>
			<v-card>
				<latest-sales />
			</v-card>
		</v-flex>
	</v-layout>
</template>

<script>
// @ is an alias to /src
import LatestSales from "@/components/LatestSales";
import OutstandingPartOrders from "@/components/OutstandingPartOrders";
import OutstandingRepairOrders from "@/components/OutstandingRepairOrders";
export default {
	components: { LatestSales, OutstandingPartOrders, OutstandingRepairOrders },
	computed: {},
	methods: {}
};
</script>
