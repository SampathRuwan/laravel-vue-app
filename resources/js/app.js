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
        products:[],
        productItem: {'name':'','sku':'','description':'','inventory':''},
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
                // alert('error')
            }else{
                _this.hasError =  true;
                axios.post('/saveProduct', input).then(function (response) {
                    _this.productItem = {'name':'','sku':'','description':'','inventory':''}

                    _this.getProducts();
                    _this.productAddModal=false;

                });
            }

        }
    }

});
