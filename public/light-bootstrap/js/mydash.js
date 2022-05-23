
import VueAxios from 'vue-axios';
import axios from 'axios';



require('./bootstrap');

window.Vue = require('vue');

//import VueAxios from 'vue-axios';
//import axios from 'axios';

Vue.use(VueAxios, axios);


Vue.component('chart-component', require('./components/ChartComponent.vue'));


const app = new Vue({
    el: '#app'
});



