<template>
	<div>{{customer.name}}</div>
</template>

<script>
import { mapState } from "vuex";
export default {
	computed: {
		...mapState("customers", ["customer"])
	},
	methods: {}
};
</script>
