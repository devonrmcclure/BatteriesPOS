<template>
	<input type="text" placeholder="Search By Sku" v-model="sku" @keyup.enter="getInfo(sku)"/>
	<input type="text" placeholder="Search By Description" v-model="description" @keyup.enter="getByDescription(description)"/>
	
    <h2>Results</h2>
    <table>
        <tr>
            <th>SKU</th>
            <th>Description</th>
            <th>Manufacturer</th>
            <th>Part Number</th>
            <th>Price</th>
            <th>On Hand</th>
        </tr>

        <tr v-for="product in products">
            <td>{{product.sku}}</td>
            <td>{{product.description}}</td>
            <td>{{product.manufacturer}}</td>
            <td>{{product.model_number}}</td>
            <td>${{product.unit_price.toFixed(2)}}</td>
            <td>0</td>
        </tr>
    </table>
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
			products: [],
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
            var url = '/inventory/' + sku;
              
            document.location.href = url;
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
            var url = '/api/v0/inventory?like=description,' + description + '&order_by=description,asc';
              
            this.$http.get(url, {api_token: 'token'}).then(function(response) {
                this.$set('products', response.data.data);
                // this.$set('sku', response.data.data[0].sku);
                // this.getQoh(this.sku);
                // this.getLastSale(this.sku); 

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