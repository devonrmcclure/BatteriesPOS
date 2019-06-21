<template>
	<v-container grid-list-md>
		<v-layout row wrap>
			<v-flex xs12>
				<v-toolbar-title class="text-xs-left">Part Order: #391399</v-toolbar-title>
				<v-stepper non-linear v-model="e1">
					<v-stepper-header>
						<v-stepper-step editable step="1">Gather info</v-stepper-step>

						<v-divider></v-divider>

						<v-stepper-step editable step="2">Payment</v-stepper-step>

						<v-divider></v-divider>

						<v-stepper-step editable step="3">Overview</v-stepper-step>
					</v-stepper-header>

					<v-stepper-items>
						<v-stepper-content step="1">
							<v-card class="mb-5" color="white" flat>
								<v-layout row wrap>
									<v-flex xs9></v-flex>
									<v-flex xs3>
										<customer></customer>
									</v-flex>
								</v-layout>
							</v-card>

							<v-btn color="primary" @click="e1 = 2">Continue</v-btn>

							<v-btn flat>Cancel</v-btn>
						</v-stepper-content>

						<v-stepper-content step="2">
							<v-card class="mb-5" color="white" flat>
								<v-layout row wrap>
									<v-flex xs9></v-flex>
									<v-flex xs3>
										<customer></customer>
									</v-flex>
								</v-layout>
							</v-card>

							<v-btn color="primary" @click="e1 = 3">Continue</v-btn>

							<v-btn flat>Cancel</v-btn>
						</v-stepper-content>

						<v-stepper-content step="3">
							<v-card class="mb-5" color="white" flat></v-card>

							<v-btn color="primary" @click="e1 = 1">Continue</v-btn>

							<v-btn flat>Cancel</v-btn>
						</v-stepper-content>
					</v-stepper-items>
				</v-stepper>
			</v-flex>
		</v-layout>
	</v-container>
</template>

<script>
// @ is an alias to /src
import customerShow from "@/components/customer/show.vue";
export default {
	components: {
		customer: customerShow
	},
	data() {
		return {
			e1: 0
		};
	},
	computed: {},
	methods: {}
};
</script>
