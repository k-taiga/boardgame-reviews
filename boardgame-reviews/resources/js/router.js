import Vue from 'vue'
import VueRouter from 'vue-router'


// VueRouterプラグインを使用する
// これによって<RouterView />コンポーネントなどを使うことができる
Vue.use(VueRouter)

// パスとコンポーネントのマッピング
const routes = [
]

// VueRouterインスタンスをエクスポートする
// app.jsでインポートするため
const router = new VueRouter({
    mode: 'history',
    routes
})

export default router
