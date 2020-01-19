<template>
    <div id="app">
        <bdNavbar :user="user" @sign-out-clicked="signOut"></bdNavbar>
        <main>
            <message />
            <transition name="fade" mode="out-in">
                <router-view />
            </transition>
        </main>
        <bdFooter></bdFooter>
    </div>
</template>

<script>
import bdNavbar from "./components/Navbar.vue";
import bdFooter from "./components/Footer.vue";
import message from "./components/Message.vue";

import { INTERNAL_SERVER_ERROR } from "./util";

export default {
    name: "app",
    components: { bdNavbar, bdFooter, message },
    data() {
        return {
            user: null
        };
    },
    // storeのステートを算出プロパティで参照しwatchで監視する
    computed: {
        errorCode() {
            return this.$store.state.error.code;
        },
        apiStatus() {
            return this.$store.state.auth.apiStatus;
        }
    },
    watch: {
        errorCode: {
            handler(val) {
                if (val === INTERNAL_SERVER_ERROR) {
                    this.$router.push("/500");
                }
            },
            immediate: true
        },
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
        // console.log(this.user);
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
