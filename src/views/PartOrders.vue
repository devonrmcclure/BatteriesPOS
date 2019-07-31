<template>
	<v-layout row wrap>
		<v-flex xs12>
			<v-toolbar-title class="text-xs-left">Part Orders</v-toolbar-title>
				<show-part-orders></show-part-orders>
		</v-flex>
	</v-layout>
</template>

<script>
// @ is an alias to /src
import ShowPartOrders from "@/components/ShowPartOrders.vue";
export default {
	components: {
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
