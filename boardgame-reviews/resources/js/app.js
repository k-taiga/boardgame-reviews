import "./bootstrap";

import Vue from "vue";
import router from "./router";
// ルートコンポーネント
import App from "./App.vue";
// vuexのstore
import store from "./store";

// vue element
import ElementUI from "element-ui";
import "element-ui/lib/theme-chalk/index.css";
Vue.use(ElementUI);

new Vue({
    el: "#app",
    router,
    store,
    components: { App },
    template: "<App />"
});
