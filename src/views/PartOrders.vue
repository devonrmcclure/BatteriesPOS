<template>
	<v-layout row wrap>
		<v-flex xs12>
			<v-toolbar-title class="text-xs-left">Part Orders</v-toolbar-title>
			<v-card>
				<show-part-orders></show-part-orders>
			</v-card>
		</v-flex>
	</v-layout>
</template>

<script>
// @ is an alias to /src
import customerShow from "@/components/customer/show.vue";
import ShowPartOrders from "@/components/ShowPartOrders.vue";
export default {
	components: {
		customer: customerShow,
		showPartOrders: ShowPartOrders
	},
	data() {
		return {
		};
	},
	computed: {},
	methods: {}
};
</script>
