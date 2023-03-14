require('./bootstrap');
window.Vue = require('vue');

import Vue              from 'vue'
import router           from './routes/index';
import Api              from './routes/api';
import { store }        from "./stores/index";
import helper           from "./helper";
import VueSweetalert2   from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

window.store = store;
window.Api = Api;
if (window.store.getters.isLoggedIn === true) {
    Vue.prototype.assetPath = `/storage/${window.store.getters.authUser.username}/`;
}
Vue.prototype.mainDomain = location.hostname;
Vue.use(VueSweetalert2);

Vue.use({
    install() {
        Vue.helper = helper;
        Vue.prototype.$helper = helper;
    }
});


const app = new Vue({
    router,
    store,
    Api,
}).$mount('#app');
