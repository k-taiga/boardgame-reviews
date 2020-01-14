import Vue from "vue";
import VueRouter from "vue-router";
import Home from "./views/Home.vue";
import SignUp from "./views/SignUp.vue";
import SignIn from "./views/SignIn.vue";

// vuex
import store from "./store";

// VueRouterプラグインを使用する
// これによって<RouterView />コンポーネントなどを使うことができる
Vue.use(VueRouter);

// パスとコンポーネントのマッピング
// const routes = [];

// VueRouterインスタンスをエクスポートする
// app.jsでインポートするため
const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/sign_up",
            name: "sign_up",
            component: SignUp,
            meta: { login: true }
        },
        {
            path: "/sign_in",
            name: "sign_in",
            component: SignIn,
            meta: { login: true }
        }
    ]
});

// beforeEach の登録
// router.beforeEach((to, from, next) => {
//     // 表示しようとしているページがlogin設定されているかどうかを判別する
//     if (to.matched.some(rec => rec.meta.login)) {
//         console.log(store.getters);
//         console.log(store.getters["auth/check"]);
//         if (store.getters["auth/user"]) {
//             // if (store.getters["auth/check"]) {
//             // ログインしているので(/)を表示
//             // console.log(store.getters["auth/user"]);
//             next({ name: "home" });
//             // next("/");
//         } else {
//             // ログインしていないのでそのまま表示する
//             // console.log(store.getters["auth/user"]);
//             next();
//             // next({ name: "home" });
//         }
//         // } else if (to.matched.some(rec => rec.meta.private)) {
//         //     // 表示しようとしているページがlogin設定されているかどうかを判別する
//         //     if (store.getters["auth/check"]) {
//         //         // サインインしているのでそのまま表示
//         //         next();
//         //     } else {
//         //         // サインインしていないのでエラーページを表示する
//         //         next({ name: "error_unauthorized" });
//         //     }
//         //     // どちらでもなければそのまま表示
//     } else {
//         next();
//     }
// });

export default router;
