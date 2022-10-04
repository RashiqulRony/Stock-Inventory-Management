require('./bootstrap');
window.Vue = require('vue');

import Vue              from 'vue'
import router           from './routes/index';
import Api              from './routes/api';
import { store }        from "./stores/index";
import VueSweetalert2   from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

window.store = store;
window.Api = Api;

var parts = location.hostname.split('.');
var domainName = parts.shift();
Vue.prototype.domainName = domainName;
Vue.use(VueSweetalert2);


const app = new Vue({
    router,
    store,
    Api,
}).$mount('#app');
