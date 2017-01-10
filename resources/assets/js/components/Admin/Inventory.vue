<template>
    <span class="error">{{ error }}</span>
    <table>
        <tr>
            <th>SKU</th>
            <th>Description</th>
            <th>Category</th>
            <th>Submit</th>
        </tr>
        <tr v-for="item in inventory[0]">
            <td>{{item.sku}}</td>
            <td>{{item.description}}</td>
            <td>
                <select v-model="category[$index].name">
                    <option v-for="category in categories[0]">{{category.name}} ({{category.category.name}})</option>
                </select>
            </td>
            <td @click="updateProduct(item, $index)">
                <div style="font-size: 20px; background: green; cursor: pointer;" width="50" height="50">&#10004;</div>
            </td>
        </tr>

    </table>
</template>


<script lang="babel">

import Vue from 'vue';
import NewCustomerModal from '../Modals/NewCustomerModal.vue';

export default Vue.extend({
    data() {
        return {
            inventory: [],
            categories: [],
            category: []
        }
    },

    components: {},

    props: ['location'],

    ready() {
        this.getInventory();
        this.getCategories();
    },

    methods: {
        getInventory() {
            var url = '/api/v0/admin/inventory?category_id=1&order_by=sku,asc&limit=5';

                  this.$http.get(url, {api_token: this.location.api_token}).then(function(response) {
                      this.inventory.push(response.data.data);

                  }, function(response) {
                      this.$set('error', 'The Inventory does not exist!');
                // error callback
                  });
        },

        getCategories() {
            var url = '/api/v0/admin/categories?with=category&except=parent_id,!=,NULL&order_by=name,asc&limit=all';

                  this.$http.get(url, {api_token: this.location.api_token}).then(function(response) {
                      this.categories.push(response.data.data);

                  }, function(response) {
                      this.$set('error', 'The Category does not exist!');
                // error callback
                  });
        },

        updateProduct(item, index) {
            var url = '/api/v0/admin/inventory/update';

                  this.$http.post(url, {api_token: this.location.api_token, sku: item.sku, category: this.category[index].name}).then(function(response) {
                      this.inventory[0].$remove(item);
                      console.log('wooooo');

                  }, function(response) {
                      this.$set('error', 'The Category does not exist!');
                // error callback
                  });
        }
    },

    events: {
        'new-sale': function() {
            this.getDefaultCustomer();
        },

        'new-part-order': function() {
            this.getDefaultCustomer();
        },

        'new-repair-order': function() {
            this.getDefaultCustomer();
        },
    }
});

</script>
