/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


import VueAxios from 'vue-axios';
import axios from 'axios';



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

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */



//import VueAxios from 'vue-axios';
//import axios from 'axios';

Vue.use(VueAxios, axios);


Vue.component('chart-component', require('./components/ChartComponent.vue').default);

Vue.component('chart-area-component', require('./components/AreaChart.vue').default);

Vue.component('chart-pie-component', require('./components/PieChart.vue').default);

Vue.component('datepicker', require('./components/DatePicker.vue').default);




const app = new Vue({
    el: '#app'
   

 
});