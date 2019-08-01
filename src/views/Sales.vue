<template>
	<v-layout row wrap>
		<v-flex xs8 offset-xs2>
			<v-toolbar-title class="text-xs-left">Sales History</v-toolbar-title>
			<show-sales />
		</v-flex>
	</v-layout>
</template>

<script>
import ShowSales from '@/components/ShowSales.vue';
export default {
	components: {
		showSales: ShowSales
	},
}
</script>
