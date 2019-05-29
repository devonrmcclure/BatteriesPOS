<template>
	<div class="dashboard">
		{{ name }} : {{ email }}
	</div>
</template>

<script>
// @ is an alias to /src
import { mapState } from 'vuex';
export default {

	computed: {
		...mapState('location', ['name', 'email'])
	},

	methods: {
	}
}
</script>
