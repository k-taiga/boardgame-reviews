import Vue from "vue";
import VueRouter from "vue-router";
import Home from "./views/Home.vue";
import SignUp from "./views/SignUp.vue";
import SignIn from "./views/SignIn.vue";

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
    },
    {
        path: "/sign_in",
        name: "sign_in",
        component: SignIn
    }
];

// VueRouterインスタンスをエクスポートする
// app.jsでインポートするため
const router = new VueRouter({
    mode: "history",
    routes
});

export default router;
