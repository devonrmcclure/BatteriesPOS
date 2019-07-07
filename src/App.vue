<template>
	<v-app>
		<navbar></navbar>
		<v-content>
			<v-container fluid>
				<router-view></router-view>
			</v-container>
		</v-content>

		<sale-form></sale-form>
		<v-footer app dark></v-footer>
	</v-app>
</template>

<style>
#app {
	font-family: "Avenir", Helvetica, Arial, sans-serif;
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
	color: #2c3e50;
}
</style>

<script>
import SaleForm from "@/components/SaleForm";
import Navbar from "@/components/layout/Navbar.vue";
export default {
	components: { Navbar, SaleForm },
	beforeCreate() {
		this.$store.dispatch("initStore");
	}
};
</script>
