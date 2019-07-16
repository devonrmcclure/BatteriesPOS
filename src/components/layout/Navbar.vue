<template>
	<nav>
		<v-navigation-drawer v-model="drawer" dark app absolute clipped width="220">
			<v-list three-line>
				<v-list-tile v-for="link in links" :key="link.text" router :to="link.route">
					<v-list-tile-action>
						<v-icon>{{ link.icon }}</v-icon>
					</v-list-tile-action>
					<v-list-tile-content>
						<v-list-tile-title class="white--text">{{ link.text }}</v-list-tile-title>
					</v-list-tile-content>
				</v-list-tile>
			</v-list>
		</v-navigation-drawer>

		<v-toolbar color="indigo" dark fixed app clipped-left>
			<v-toolbar-side-icon @click="drawer = !drawer"></v-toolbar-side-icon>
			<v-toolbar-title class="white--text">BatteriesPOS</v-toolbar-title>
			<v-spacer></v-spacer>

			<v-toolbar-items>
				<v-btn depressed color="success" @click="newSale()">New Sale</v-btn>
				<v-btn depressed color="info" @click="newPartOrder()">New Part Order</v-btn>
				<v-btn flat>New Repair Order</v-btn>
			</v-toolbar-items>
		</v-toolbar>
	</nav>
</template>

<script>
import { mapState } from "vuex";
export default {
	data() {
		return {
			drawer: true,
			links: [
				{ icon: "dashboard", text: "Dashboard", route: "/" },
				{ icon: "shopping_cart", text: "Sales", route: "/sales" },
				{
					icon: "shopping_basket",
					text: "Part Orders",
					route: "/part-orders"
				},
				{
					icon: "build",
					text: "Repair Orders",
					route: "/repair-orders"
				},
				{ icon: "assessment", text: "Stats", route: "/stats" }
			],
		};
	},

	computed: {
	},
	methods: {
		newSale() {
			this.$store.commit("sales/SET_SHOW_DIALOG", true);
		},
		newPartOrder() {
			this.$store.commit("partOrders/SET_SHOW_DIALOG", true);
		}
	}
};
</script>
