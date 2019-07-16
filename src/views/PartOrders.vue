<template>
	<v-layout row wrap>
		<v-flex xs12>
			<v-toolbar-title class="text-xs-left">Part Order: #391399</v-toolbar-title>
			<v-card>
				<v-card-text>Meow</v-card-text>
			</v-card>
		</v-flex>
	</v-layout>
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
		};
	},
	computed: {},
	methods: {}
};
</script>
