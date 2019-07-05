<template>
	<v-container grid-list-md>
		<v-layout row wrap>
			<v-flex xs12>
				<v-toolbar-title class="text-xs-left">Part Order: #391399</v-toolbar-title>
				
			</v-flex>
		</v-layout>
	</v-container>
</template>

<script>
// @ is an alias to /src
import customerShow from "@/components/customer/show.vue";
export default {
	components: {
		customer: customerShow
	},
	data() {
		return {
			e1: 0
		};
	},
	computed: {},
	methods: {}
};
</script>
