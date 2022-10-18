import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router);

import Login                from '../components/auth/Login'
import Header               from '../components/share/Header';
import Footer               from '../components/share/Footer';
import NotFound             from '../components/NotFound'

import Dashboard            from '../components/Dashboard'
import Profile              from '../components/Profile'

import Category             from '../components/category/Index'
import CategoryCreate       from '../components/category/Create'
import CategoryEdit         from '../components/category/Edit'

import Subcategory          from '../components/subcategory/Index'
import SubcategoryCreate    from '../components/subcategory/Create'
import SubcategoryEdit      from '../components/subcategory/Edit'

import Brand                from '../components/brand/Index'
import BrandCreate          from '../components/brand/Create'
import BrandEdit            from '../components/brand/Edit'

import Product              from '../components/product/Index'
import ProductCreate        from '../components/product/Create'
import ProductEdit          from '../components/product/Edit'
import ProductView          from '../components/product/View'

import Customer             from '../components/customer/Index'
import CustomerCreate       from '../components/customer/Create'
import CustomerEdit         from '../components/customer/Edit'

const router =  new Router({
    mode: 'history',
    linkExactActiveClass: "active",
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
            path: "/subcategory",
            name: "Subcategory",
            components: {'default': Subcategory, 'header': Header, 'footer': Footer},
            meta: {requiresAuth: true, title: 'Subcategory'}
        },
        {
            path: "/subcategory/create",
            name: "SubcategoryCreate",
            components: {'default': SubcategoryCreate, 'header': Header, 'footer': Footer},
            meta: {requiresAuth: true, title: 'Subcategory Create'}
        },
        {
            path: "/subcategory/edit/:id",
            name: "SubcategoryEdit",
            components: {'default': SubcategoryEdit, 'header': Header, 'footer': Footer},
            meta: {requiresAuth: true, title: 'Subcategory Edit'}
        },
        {
            path: "/brand",
            name: "Brand",
            components: {'default': Brand, 'header': Header, 'footer': Footer},
            meta: {requiresAuth: true, title: 'Brand'}
        },
        {
            path: "/brand/create",
            name: "BrandCreate",
            components: {'default': BrandCreate, 'header': Header, 'footer': Footer},
            meta: {requiresAuth: true, title: 'Brand Create'}
        },
        {
            path: "/brand/edit/:id",
            name: "BrandEdit",
            components: {'default': BrandEdit, 'header': Header, 'footer': Footer},
            meta: {requiresAuth: true, title: 'Brand Edit'}
        },
        {
            path: "/product",
            name: "Product",
            components: {'default': Product, 'header': Header, 'footer': Footer},
            meta: {requiresAuth: true, title: 'Product'}
        },
        {
            path: "/product/create",
            name: "ProductCreate",
            components: {'default': ProductCreate, 'header': Header, 'footer': Footer},
            meta: {requiresAuth: true, title: 'Product Create'}
        },
        {
            path: "/product/edit/:id",
            name: "ProductEdit",
            components: {'default': ProductEdit, 'header': Header, 'footer': Footer},
            meta: {requiresAuth: true, title: 'Product Edit'}
        },
        {
            path: "/product/view/:id",
            name: "ProductView",
            components: {'default': ProductView, 'header': Header, 'footer': Footer},
            meta: {requiresAuth: true, title: 'Product View'}
        },
        {
            path: "/customer",
            name: "Customer",
            components: {'default': Customer, 'header': Header, 'footer': Footer},
            meta: {requiresAuth: true, title: 'Customer'}
        },
        {
            path: "/customer/create",
            name: "CustomerCreate",
            components: {'default': CustomerCreate, 'header': Header, 'footer': Footer},
            meta: {requiresAuth: true, title: 'Customer Create'}
        },
        {
            path: "/customer/edit/:id",
            name: "CustomerEdit",
            components: {'default': CustomerEdit, 'header': Header, 'footer': Footer},
            meta: {requiresAuth: true, title: 'Customer Edit'}
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
