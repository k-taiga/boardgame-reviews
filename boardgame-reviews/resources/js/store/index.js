import Vue from "vue";
import Vuex from "vuex";

import auth from "./auth";
import error from "./error";
import message from "./message";
import ward from "./ward";

Vue.use(Vuex);

const store = new Vuex.Store({
    modules: {
        auth,
        error,
        message,
        ward
    }
});

export default store;
