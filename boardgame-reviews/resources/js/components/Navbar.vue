<template>
  <nav id="nav" class="navbar has-shadow" role="navigation" aria-label="main navigation">
    <div class="container">
      <div class="navbar-brand">
        <RouterLink to="/" class="navbar-item">
          <bdIcon name="chess-knight has-text-white"></bdIcon>
          <span class="has-text-white">BoardGameReviews</span>
        </RouterLink>
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
        <bd23wards></bd23wards>
      </div>
      <div id="navbar-links" class="navbar-menu">
        <div class="navbar-end" v-if="user">
          <bd-tweet></bd-tweet>
          <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link">
              <bdIcon name="user has-text-white"></bdIcon>
            </a>
            <div class="navbar-dropdown is-right">
              <RouterLink class="navbar-item" :to="{ name: 'profile' }">
                <bdIcon name="address-card"></bdIcon>
                <span>プロフィール</span>
              </RouterLink>
              <RouterLink class="navbar-item" :to="{ name: 'auth_edit' }">
                <bdIcon name="user-edit"></bdIcon>
                <span>認証情報変更</span>
              </RouterLink>
              <a class="navbar-item" @click="signOut">
                <bdIcon name="sign-out-alt has-text-black"></bdIcon>
                <span class="has-text-black">ログアウト</span>
              </a>
            </div>
          </div>
        </div>
        <div class="navbar-end" v-else>
          <bd-tweet></bd-tweet>
          <div class="navbar-item">
            <RouterLink :to="{ name: 'sign_in' }" class="button is-text">
              <bdIcon name="sign-in-alt has-text-white"></bdIcon>
              <span class="has-text-white">ログイン</span>
            </RouterLink>
          </div>
          <div class="navbar-item">
            <RouterLink :to="{ name: 'sign_up' }" class="button is-text">
              <bdIcon name="user-plus has-text-white"></bdIcon>
              <span class="has-text-white">ユーザー登録</span>
            </RouterLink>
          </div>
        </div>
      </div>
    </div>
  </nav>
</template>

<script>
import bdIcon from "./Icon.vue";
import bdTweet from "./Tweet.vue";
import bd23wards from "./23wards.vue";

export default {
  name: "Navbar",
  components: { bdIcon, bdTweet, bd23wards },
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
