import Vue from 'vue';
import axios from "axios";
import VueAxios from 'vue-axios';

//Main pages
import App from './views/app.vue';

// Import Bootstrap an BootstrapVue CSS files (order is important)
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';


Vue.use(BootstrapVue);
Vue.use(IconsPlugin)
Vue.use(VueAxios, axios);

const app = new Vue({
    el: '#app',
    components: { App }
});
