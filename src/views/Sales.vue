<template>
	<v-layout>
		<v-flex xs12>
			<show-sales></show-sales>
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
