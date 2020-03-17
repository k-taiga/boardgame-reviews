<template>
    <nav
        id="nav"
        class="navbar has-shadow"
        role="navigation"
        aria-label="main navigation"
    >
        <div class="container">
            <div class="navbar-brand">
                <router-link to="/" class="navbar-item">
                    <bdIcon name="chess-knight has-text-white"></bdIcon>
                    <span class="has-text-white">BoardGameReviews</span>
                </router-link>
                <a
                    role="button"
                    id="navbar-burger"
                    class="navbar-burger burger"
                    aria-label="menu"
                    aria-expanded="false"
                    data-target="navbar-links"
                >
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>
            <div id="navbar-links" class="navbar-menu">
                <div class="navbar-end" v-if="user">
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            <bdIcon name="user has-text-white"></bdIcon>
                        </a>
                        <div class="navbar-dropdown is-right">
                            <router-link class="navbar-item" :to="{ name: 'profile' }">
                                <bdIcon name="address-card"></bdIcon>
                                <span>プロフィール</span>
                            </router-link>
                            <a class="navbar-item" @click="signOut">
                                <bdIcon
                                    name="sign-out-alt has-text-black"
                                ></bdIcon>
                                <span class="has-text-black">ログアウト</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="navbar-end" v-else>
                    <div class="navbar-item">
                        <router-link
                            :to="{ name: 'sign_in' }"
                            class="button is-text"
                        >
                            <bdIcon name="sign-in-alt has-text-white"></bdIcon>
                            <span class="has-text-white">ログイン</span>
                        </router-link>
                    </div>
                    <div class="navbar-item">
                        <router-link
                            :to="{ name: 'sign_up' }"
                            class="button is-text"
                        >
                            <bdIcon name="user-plus has-text-white"></bdIcon>
                            <span class="has-text-white">ユーザー登録</span>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
import bdIcon from "./Icon.vue";

export default {
    name: "Navbar",
    components: { bdIcon },
    props: {
        user: null
    },
    methods: {
        signOut() {
            this.$emit("sign-out-clicked");
        },
        showForm() {
            this.$emit("photo-form-clicked");
        }
    }
};
</script>

<style scoped>
.navbar {
    background-color: #a6d4cc;
}

.button.is-text {
text-decoration: none;
}
</style>
