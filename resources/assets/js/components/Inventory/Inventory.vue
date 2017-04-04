<template>
	<input type="text" placeholder="Search By Sku" v-model="sku" @keyup.enter="getInfo(sku)"/>
	<input type="text" placeholder="Search By Description" v-model="description" @keyup.enter="getByDescription(description)"/>
	<h2>{{ product[0].description }}</h2>
	Price: {{ product[0].unit_price | currency}} <br/> Last sold: {{ last_sale | moment }}

    <br />
    <img src="{{product[0].image}}" height="100px" width="100px"/>

	<h3>Quantity On Hand</h3>
	<ul>
		<li v-for="location in qoh"><b>{{ location.name }}</b>: {{ location.qoh[0].quantity }}</li>
	</ul>
</template>

<script>
import Vue from 'vue';
import Moment from 'moment';

export default Vue.extend({

	data() {
		return {
			sku: '',
			description: '',
            last_sale: '',
			product: [],
			qoh: []
		}
	},

	methods: {
		getInfo(sku) {
			this.getProduct(sku);
			this.getQoh(sku);
            this.getLastSale(sku);
		},

		getProduct(sku) {
            var url = '/api/v0/inventory?sku=' + sku;
              
            this.$http.get(url, {api_token: 'token'}).then(function(response) {
                this.$set('product', response.data.data);

            }, function(response) {
            // error callback
            });
        },

        getQoh(sku) {
        	var url = '/api/v0/location?with=qoh&wherewith=sku,=,' + sku + '';
              
            this.$http.get(url, {api_token: 'token'}).then(function(response) {
                this.$set('qoh', response.data.data);

            }, function(response) {
            // error callback
            });
        },

        getByDescription(description) {
            var url = '/api/v0/inventory?description=' + description;
              
            this.$http.get(url, {api_token: 'token'}).then(function(response) {
                this.$set('product', response.data.data);
                this.$set('sku', response.data.data[0].sku);
                this.getQoh(this.sku);
                this.getLastSale(this.sku); 

            }, function(response) {
            // error callback
            });
        },

        getLastSale(sku) {
            var url = '/api/v0/sales?sku=' + sku + '&location_id=3&limit=1';
              
            this.$http.get(url, {api_token: 'token'}).then(function(response) {
                this.$set('last_sale', response.data.data[0].created_at);

            }, function(response) {
            // error callback
                this.$set('last_sale', 'No Previous Sale');
            });
        }
	},

    filters: {
      moment: function (date) {
        if(date !== 'No Previous Sale' && date !== '')
        {
            return Moment(date).format('MMMM Do YYYY, H:mm');
        }
            return 'No Sales History';
      }
    }


});

</script>