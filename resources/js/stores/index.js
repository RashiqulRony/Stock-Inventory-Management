import Vue from "vue";
import Vuex from "vuex";

import auth from "./auth";
import common from "./common";

Vue.use(Vuex);

export const store = new Vuex.Store({
    modules: {
        auth: auth,
        common: common,
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
