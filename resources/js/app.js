/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

console.log('vue js working !!!');

Vue.component("modal", {
    template: "#modal-template"
});
const app = new Vue({
    el: '#app_vue',

    data: {
        hasError: true,
        numberError: true,
        productAddModal:false,
        updateProductModal:false,
        products:[],
        productItem: {'name':'','sku':'','description':'','inventory':''},
        update_id:'',
        update_name:'',
        update_sku:'',
        update_description:'',
        update_inventory:'',

    },
    mounted: function mounted(){
        this.getProducts();
    },
    methods: {
        getProducts: function getProducts(){
            var _this = this;
            axios.get('/getProducts').then(function (response) {
                _this.products = response.data;
            })
        },

        saveProduct: function saveProduct() {
            var _this = this;
            var input = this.productItem;

            if(input['name'] === '' ||input['sku'] === '' ||input['description'] === '' ||
                input['inventory'] === ''){
                _this.hasError = false;
            }
            else{
                _this.hasError =  true;
                axios.post('/saveProduct', input).then(function (response) {
                    _this.productItem = {'name':'','sku':'','description':'','inventory':''}

                    _this.getProducts();
                    _this.productAddModal=false;

                });
            }

        },
        setValue(val_id, val_name,val_sku, val_description, val_inventory) {
            this.update_id = val_id;
            this.update_name = val_name;
            this.update_sku = val_sku;
            this.update_description = val_description;
            this.update_inventory = val_inventory;
        },

        deleteProduct: function deleteProduct(product) {
            var _this = this;
            if(confirm('Are you want to delete this ?')){
                axios.post('/deleteProduct/'+ product.id).then(function (response) {
                    _this.getProducts();
                })
            }
        },
        updateProduct: function updateProduct() {
            var _this = this;
            var id_val = document.getElementById('update_id');
            var name_val = document.getElementById('update_name');
            var sku_val = document.getElementById('update_sku');
            var desc_val = document.getElementById('update_description');
            var inv_val = document.getElementById('update_inventory');

            // _this.hasError =  true;

            axios.post('/updateProduct/' + id_val.value, {val_1: name_val.value, val_2: sku_val.value,
                val_3: desc_val.value, val_4: inv_val.value})
                .then(function (response) {

                    _this.getProducts();
                    _this.updateProductModal = false;
                });
        }
    }

});
