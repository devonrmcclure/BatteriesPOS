<template>
    <div class="login">
		<v-alert :value="error.value">{{ error.message }}</v-alert>
        <v-container>
            <v-layout row>
                <v-flex xs12 md3>
                    <v-card class="pa-3">
						<h2 subheading>Please log in!</h2>
                        <v-form v-model="valid">
                            <v-text-field
                                v-model="username"
                                :rules="usernameRules"
                                label="Username"
                                required
                            ></v-text-field>
                            <v-text-field
                                v-model="password"
                                :rules="passwordRules"
                                label="Password"
								type="password"
                                required
                            ></v-text-field>
							<v-btn 
								:disabled="!valid"
								@click="submit"
								color="primary">
								Login
							</v-btn>
                          </v-form>
                    </v-card>
                </v-flex>
            </v-layout>
        </v-container>
    </div>
</template>


<script>
import Auth from '../api/Auth.js';
export default {
    data: () => ({
		valid: false,
		username: '',
		usernameRules: [
			v => !!v || 'Username is required'
		],
		password: '',
		passwordRules: [
			v => !!v || 'Password is required'
		],
		error: {
			value: false,
			message: ''
		}
	}),

	methods: {
		async submit() {

			const login = await Auth.login(this.username, this.password);
			if(login.success) {
				this.$router.push('/');
			} else {
				this.error.value = true;
				this.error.message = login.error;
			}
		}
	}
}
</script>
