

require('./bootstrap');

window.Vue = require('vue');


//Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('test-component', require('./components/Test.vue'));
Vue.component('ajax-component', require('./components/ajax.vue'));
Vue.component('chartline-component', require('./components/linechart.vue'));
Vue.component('chartpie-component', require('./components/piechart.vue'));

const app = new Vue({
    el: '#app'
});

//alert('ff');
