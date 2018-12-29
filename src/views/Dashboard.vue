<template>
	<div class="dashboard">
		weee
	</div>
</template>

<script>
// @ is an alias to /src
import Cache from '@/api/Cache';

export default {
	mounted() {
		const expiresInSecs = 60;
		const data = Cache.isCached('dsa');
		
		if (!data) {
			Cache.setCache('dsa', {'meow': 'test'}, expiresInSecs);
		}

	}
}
</script>
