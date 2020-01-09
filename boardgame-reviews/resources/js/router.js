import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from "./views/Home.vue";


// VueRouterプラグインを使用する
// これによって<RouterView />コンポーネントなどを使うことができる
Vue.use(VueRouter)

// パスとコンポーネントのマッピング
const routes = [
    {
        path: "/",
        name: "home",
        component: Home
    }
]

// VueRouterインスタンスをエクスポートする
// app.jsでインポートするため
const router = new VueRouter({
    mode: 'history',
    routes
})

export default router
