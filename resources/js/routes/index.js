import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router);

import Login           from '../components/auth/Login'
import Header          from '../components/share/Header';
import Footer          from '../components/share/Footer';
import NotFound       from '../components/NotFound'

import Dashboard       from '../components/Dashboard'


const router =  new Router({
    mode: 'history',
    routes: [
        {
            path: "/",
            name: "Home",
            components: {'default': Login},
            meta: {title: 'Login'}
        },
        {
            path: "/login",
            name: "Login",
            components: {'default': Login },
            meta: {title: 'Login'}
        },
        {
            path: "/dashboard",
            name: "Dashboard",
            components: {
                'default': Dashboard,
                'header': Header,
                'footer': Footer,
            },
            meta: {requiresAuth: true, title: 'Dashboard'}
        },
        {
            path: "/:catchAll(.*)",
            name: "NotFound",
            component: NotFound,
            meta: {title: '404 Not Found'}
        }



    ],
    scrollBehavior (to, from, savedPosition) {
        return { x: 0, y: 0 }
    }
});

router.beforeEach((toRoute, fromRoute, next) => {
    window.document.title = toRoute.meta && toRoute.meta.title ? "RonInve | " + toRoute.meta.title : 'Login';
    if (toRoute.matched.some(record => record.meta.requiresAuth)) {
        if (store.getters.isLoggedIn === false) {
            next({
                path: '/login',
            })
        } else {
            next()
        }
    } else {
        next()
    }
});

export default router;
