<template>
    <span class="error">{{ error }}</span>
    <table>
        <tr>
            <th>SKU</th>
            <th>Associated Sku</th>
            <th class="hidden">Type</th>
            <th>Multiplyer (num items in pack)</th>
            <th>Action</th>
        </tr>
        <tr>
            <td><input type="text" id="sku" name="sku" v-model="sku"></td>
            <td><input type="text" id="associated-sku" name="associated-sku" v-model="associated_sku"></td>
            <td class="hidden">
                <input type="text" id="type" name="type" value="eco_fee">
                <!-- <select id="type" name="type" v-model="type">
                    <option value="eco_fee">ECO Fee</option>
                </select> -->
            </td>
            <td><input type="text" id="multiplyer" name="multiplyer" v-model="multiplyer"></td>
            <td @click="updateProduct()">
                <div style="font-size: 20px; background: green; cursor: pointer;" width="50" height="50">&#10004;</div>
            </td>
        </tr>

    </table>
</template>


<script lang="babel">

import Vue from 'vue';

export default Vue.extend({
    data() {
        return {
            sku: '',
            associated_sku: '',
            type: 'eco_fee',
            multiplyer: ''
        }
    },

    components: {},

    props: ['location'],

    ready() {
        this.getInventory();
    },

    methods: {
        getInventory() {
            var url = '/api/v0/admin/inventory?category_id=1&order_by=sku,asc&limit=50';

                  this.$http.get(url, {api_token: this.location.api_token}).then(function(response) {
                      this.inventory.push(response.data.data);

                  }, function(response) {
                      this.$set('error', 'The Inventory does not exist!');
                // error callback
                  });
        },

        updateProduct() {
            var url = '/api/v0/admin/inventory/associated-skus';

                  this.$http.post(url, {api_token: this.location.api_token, sku: this.sku, associated_sku: this.associated_sku, type: this.type, multiplyer: this.multiplyer}).then(function(response) {
                      this.sku = '',
                      this.associated_sku = '',
                      this.type = '',
                      this.multiplyer = ''
                      console.log('wooooo');

                  }, function(response) {
                      this.$set('error', 'error');
                // error callback
                  });
        }
    },

    events: {
    }
});

</script>
