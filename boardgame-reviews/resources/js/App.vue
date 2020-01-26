<template>
    <div id="app">
        <bdNavbar :user="user" @sign-out-clicked="signOut"></bdNavbar>
        <main>
            <!-- <message /> -->
            <transition name="fade" mode="out-in">
                <router-view />
            </transition>
        </main>
        <bdFooter></bdFooter>
        <errorModal></errorModal>
    </div>
</template>

<script>
import bdNavbar from "./components/Navbar.vue";
import bdFooter from "./components/Footer.vue";
import message from "./components/Message.vue";
import errorModal from "./views/errors/ErrorModal.vue";
import store from "./store";

import { NOT_FOUND, UNAUTHORIZED, INTERNAL_SERVER_ERROR } from "./util";

export default {
    name: "app",
    components: { bdNavbar, bdFooter, message, errorModal },
    data() {
        return {
            user: null
        };
    },
    // storeのステートを算出プロパティで参照しwatchで監視する
    computed: {
        //     errorCode() {
        //         const response = this.$store.state.error.code;

        //         // this.$router.push("/error", this.$store.state.error.code);
        //         // if (response === INTERNAL_SERVER_ERROR) {
        //         //     this.$router.push("/500");
        //         // }
        //     },
        apiStatus() {
            return this.$store.state.auth.apiStatus;
        }
    },
    watch: {
        //     errorCode: {
        //         async handler(val) {
        //             if (val === INTERNAL_SERVER_ERROR) {
        //                 this.$router.push("/500");
        //             } else if (val === UNAUTHORIZED) {
        //                 // トークンをリフレッシュ
        //                 await axios.get("/api/refresh-token");
        //                 // ストアのuserをクリア
        //                 this.$store.commit("auth/setUser", null);
        //                 // ログイン画面へ
        //                 this.$router.push("/login");
        //             } else if (val === NOT_FOUND) {
        //                 this.$router.push("/not-found");
        //             }
        //         },
        //         immediate: true
        //     },
        $route(to, from) {
            this.$store.commit("error/setCode", null);
            if (to.path == "/sign_in" || to.path == "/sign_up") {
                console.log("$routerが切り替わりました");
                this.clearError();
            }
        }
    },
    async created() {
        this.user = await this.$store.dispatch("auth/currentUser");
        console.log(this.user);
    },
    updated() {
        this.user = this.$store.getters["auth/check"];
        // this.user = this.$store.dispatch("auth/currentUser");
        // console.log(this.user);
    },
    methods: {
        async signOut() {
            await this.$store.dispatch("auth/logout");

            if (this.apiStatus) {
                this.$router.push("/sign_in");
            }
        },
        clearError() {
            this.$store.commit("auth/setLoginErrorMessages", null);
            this.$store.commit("auth/setRegisterErrorMessages", null);
            console.log("clearErrorしました。");
        }
    }
};
</script>

<style scoped>
.fade-enter,
.fade-leave-to {
    opacity: 0;
}
.fade-enter-to,
.fade-leave {
    opacity: 1;
}
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.3s;
}
</style>
