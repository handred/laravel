

require('./bootstrap');

window.Vue = require('vue');

window.io = require('socket.io-client');


//Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('test-component', require('./components/Test.vue'));
Vue.component('ajax-component', require('./components/ajax.vue'));
Vue.component('chartline-component', require('./components/linechart.vue'));
Vue.component('chartpie-component', require('./components/piechart.vue'));
Vue.component('chartevent-component', require('./components/eventchart.vue'));

const app = new Vue({
    el: '#app'
});

//alert('ff');
