<template>
	<nav>
		<v-toolbar color="indigo" dark fixed app clipped-left dense>
			<v-toolbar-side-icon @click="drawer = !drawer"></v-toolbar-side-icon>
			<v-toolbar-title class="white--text">{{ name }}</v-toolbar-title>
			<v-spacer></v-spacer>
			<v-btn icon>
				<v-icon>apps</v-icon>
			</v-btn>
		</v-toolbar>

		<v-navigation-drawer v-model="drawer" dark app absolute clipped width="220">
			<v-list>
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
	</nav>
</template>

<script>
import { mapState } from 'vuex';
export default {
	data() {
		return {
			drawer: true,
			links: [
				{ icon: 'dashboard', text: 'Dashboard', route: '/' },
				{ icon: 'folder', text: 'Projects', route: '/projects' },
				{ icon: 'person', text: 'About', route: '/about' },
			]
		}
	},
	computed: {
		...mapState('location', ['name'])
	},
}
</script>
