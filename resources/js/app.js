

require('./bootstrap');

window.Vue = require('vue');


//Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('test-component', require('./components/Test.vue'));

const app = new Vue({
    el: '#app'
});

//alert('ff');
