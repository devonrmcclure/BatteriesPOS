<template>
	
</template>

<script>

export default {
	components: {

	},

	mounted() {
		this.$store.commit('sales/SET_SHOW_DIALOG', true); //TODO: REMOVE AND USE FAB FOR SALES
	}
}
</script>
