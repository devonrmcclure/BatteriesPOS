<template>
	<v-app>
		<navbar v-if="isAuthed !== false"></navbar>
		<v-content>
			<v-container fluid>
				<v-alert :value="error.show" type="error">{{ error.message }}</v-alert>
				<router-view></router-view>
			</v-container>
		</v-content>

		<v-footer app dark>
			<v-spacer></v-spacer>
			<span>footer things &copy;</span>
			<v-spacer></v-spacer>
		</v-footer>
		<sale-form></sale-form>
		<part-order-form></part-order-form>
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
import Cache from "@/helpers/Cache";
import PartOrderForm from "@/components/PartOrderForm";
import { mapState } from "vuex";
export default {
	components: { Navbar, SaleForm, PartOrderForm },
	data() {
		return {};
	},
	computed: {
		...mapState(["error"]),
		isAuthed() {
			return Cache.isCached("auth");
		}
	},
	beforeCreate() {
		// Only set store/do api requests if logged in.
		if (Cache.isCached("auth")) {
			this.$store.dispatch("initStore");
		}
	}
};
</script>
