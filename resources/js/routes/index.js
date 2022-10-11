import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router);

import Login            from '../components/auth/Login'
import Header           from '../components/share/Header';
import Footer           from '../components/share/Footer';
import NotFound         from '../components/NotFound'

import Dashboard        from '../components/Dashboard'
import Profile          from '../components/Profile'

import Category         from '../components/category/Index'
import CategoryCreate   from '../components/category/Create'
import CategoryEdit     from '../components/category/Edit'


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
            components: {'default': Dashboard, 'header': Header, 'footer': Footer},
            meta: {requiresAuth: true, title: 'Dashboard'}
        },
        {
            path: "/profile",
            name: "Profile",
            components: {'default': Profile, 'header': Header, 'footer': Footer},
            meta: {requiresAuth: true, title: 'Profile'}
        },
        {
            path: "/category",
            name: "Category",
            components: {'default': Category, 'header': Header, 'footer': Footer},
            meta: {requiresAuth: true, title: 'Category'}
        },
        {
            path: "/category/create",
            name: "CategoryCreate",
            components: {'default': CategoryCreate, 'header': Header, 'footer': Footer},
            meta: {requiresAuth: true, title: 'Category Create'}
        },
        {
            path: "/category/edit/:id",
            name: "CategoryEdit",
            components: {'default': CategoryEdit, 'header': Header, 'footer': Footer},
            meta: {requiresAuth: true, title: 'Category Edit'}
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
