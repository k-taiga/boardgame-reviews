<template>
    <div id="app">
        <bdNavbar :user="user" @sign-out-clicked="signOut"></bdNavbar>
        <router-view />
        <bdFooter></bdFooter>
    </div>
</template>

<script>
import bdNavbar from "./components/Navbar.vue";
import bdFooter from "./components/Footer.vue";

export default {
    name: "app",
    components: { bdNavbar, bdFooter },
    data() {
        return {
            user: null
        };
    },
    // created() {
    //     this.user = this.$store.dispatch("auth/currentUser");
    //     console.log(this.user);
    // },
    updated() {
        // this.user = this.$store.dispatch("auth/currentUser");
        console.log(this.user);
    },
    methods: {
        async signOut() {
            await this.$store.dispatch("auth/logout");
            this.$router.push("/sign_in");
        }
    }
};
</script>
