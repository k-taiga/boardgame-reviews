import Vue from "vue";
import VueRouter from "vue-router";
import Home from "./views/Home.vue";
import SignUp from "./views/SignUp.vue";

// VueRouterプラグインを使用する
// これによって<RouterView />コンポーネントなどを使うことができる
Vue.use(VueRouter);

// パスとコンポーネントのマッピング
const routes = [
    {
        path: "/",
        name: "home",
        component: Home
    },
    {
        path: "/sign_up",
        name: "sign_up",
        component: SignUp
    }
];

// VueRouterインスタンスをエクスポートする
// app.jsでインポートするため
const router = new VueRouter({
    mode: "history",
    routes
});

export default router;
