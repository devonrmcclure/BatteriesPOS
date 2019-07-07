<template>
	<div class="dashboard">
		<v-layout>
			<v-flex xs6><latest-sales/></v-flex>
		</v-layout>
		
	</div>

</template>

<script>
// @ is an alias to /src
import LatestSales from "@/components/LatestSales";
export default {
	components: { LatestSales },
	computed: {},
	methods: {}
};
</script>
