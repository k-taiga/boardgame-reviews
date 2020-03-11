import Vue from "vue";
import VueRouter from "vue-router";

// import Home from "./views/Home.vue";
// import SignUp from "./views/SignUp.vue";
// import SignIn from "./views/SignIn.vue";
// import SystemError from "./views/errors/System.vue";

// import PhotoList from "./views/PhotoList.vue";

const Home = () => import(/* webpackChunkName:"Home" */ "./views/Home.vue");
const SignUp = () =>
    import(/* webpackChunkName:"SignUp" */ "./views/SignUp.vue");
const SignIn = () =>
    import(/* webpackChunkName:"SignIn" */ "./views/SignIn.vue");
const ShopList = () =>
    import(/* webpackChunkName:"ShopList" */ "./views/ShopList.vue");
const ShopDetail = () =>
    import(/* webpackChunkName:"ShopDetail" */ "./views/ShopDetail.vue");
const Profile = () =>
    import(/* webpackChunkName:"Profile" */ "./views/Profile.vue");
const SystemError = () =>
    import(/* webpackChunkName:"SystemError" */ "./views/errors/System.vue");
const NotFoundError = () =>
    import(
        /* webpackChunkName:"NotFoundError" */ "./views/errors/NotFound.vue"
    );
const ErrorModal = () =>
    import(/* webpackChunkName:"ErrorModal" */ "./views/errors/ErrorModal.vue");

// vuex
import store from "./store";

// VueRouterプラグインを使用する
// これによって<RouterView />コンポーネントなどを使うことができる
Vue.use(VueRouter);

// VueRouterインスタンスをエクスポートする
// app.jsでインポートするため
const router = new VueRouter({
    mode: "history",
    scrollBehavior() {
        return { x: 0, y: 0 };
    },
    routes: [
        {
            path: "/",
            name: "index",
            component: ShopList,
            props: route => {
                // URL のクエリパラメータ page をページコンポーネントで取得しPhotoListのコンポーネントに返す
                // routeからpageを取得し正規表現でチェック
                const page = route.query.page;
                return { page: /^[1-9][0-9]*$/.test(page) ? page * 1 : 1 };
            }
        },
        {
            path: "/shops/:id",
            component: ShopDetail,
            props: true
        },
        {
            path: "/home",
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
        },
        {
            path: "/profile",
            name: "profile",
            component: Profile,
            meta: { login: true }
        },
        {
            path: "/500",
            name: "system_error",
            component: SystemError
        },
        // *にしてるのでルート定義以外は全部NotFoundに行く
        {
            path: "*",
            component: NotFoundError
        },
        // *にしてるのでルート定義以外は全部NotFoundに行く
        {
            path: "/error",
            component: ErrorModal
        }
    ]
});

// ナビゲーションガード の登録
// router.beforeEach((to, from, next) => {
//     console.log(store.getters["auth/user"]);
//     // 表示しようとしているページがlogin設定されているかどうかを判別する
//     if (to.matched.some(rec => rec.meta.login)) {
//         console.log(to);
//         if (store.getters["auth/user"]) {
//             // if (store.getters["auth/check"]) {
//             // ログインしているので(/)を表示
//             console.log(store.getters["auth/user"]);
//             next({ name: "index" });
//             // next("/");
//         } else {
//             // ログインしていないのでそのまま表示する
//             console.log(store.getters["auth/user"]);
//             next();
//             // next({ name: "home" });
//         }
//     } else {
//         next();
//     }
// });

export default router;
