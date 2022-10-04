import Vue from "vue";
import Vuex from "vuex";

import auth from "./auth";
import validator from "./validator";

Vue.use(Vuex);

export const store = new Vuex.Store({
    modules: {
        auth: auth,
        validator: validator,
    },
});




// For vue 3 --- vuex@next or v4
/*
import { createStore } from 'vuex'

import auth from "./auth";


const store = createStore({
    modules: {
        auth: auth,
    },
});

export default store
*/
