import "./bootstrap";

import Vue from "vue";
import router from "./router";
// ルートコンポーネント
import App from "./App.vue";
// vuexのstore
import store from "./store";

new Vue({
    el: "#app",
    router,
    store,
    components: { App },
    template: "<App />"
});
