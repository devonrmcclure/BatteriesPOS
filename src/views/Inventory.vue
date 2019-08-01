<template>
	<v-layout row wrap>
		<v-flex xs12>
			<v-toolbar-title class="text-xs-left">Inventory</v-toolbar-title>
			<show-inventory />
		</v-flex>
	</v-layout>
</template>

<script>
import ShowInventory from '@/components/ShowInventory.vue';
export default {
	components: {
		ShowInventory
	},
}
</script>
