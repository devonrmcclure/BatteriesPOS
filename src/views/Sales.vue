<template>
	<div class="dashboard">
		Sales!
	</div>
</template>

<script>
// @ is an alias to /src
import { mapState } from 'vuex';
export default {

    beforeCreate() {
        //fetch last 5 sales info in store.
    },

	computed: {
		...mapState('location', ['name', 'email'])
	},

	methods: {
	}
}
</script>
