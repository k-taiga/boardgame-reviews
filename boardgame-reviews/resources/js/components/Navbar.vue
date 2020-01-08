<template>
  <nav id="nav" class="navbar has-shadow" role="navigation" aria-label="main navigation">
    <div class="container">
      <div class="navbar-brand">
        <router-link to="/" class="navbar-item">
          <bd-icon name="chess-knight"></bd-icon>BoardGameReviews
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
              <bd-icon name="user"></bd-icon>
            </a>
            <div class="navbar-dropdown is-right">
              <a class="navbar-item" @click="signOut">
                <bd-icon name="sign-out-alt"></bd-icon>
                <span>サインアウト</span>
              </a>
            </div>
          </div>
        </div>
        <div class="navbar-end" v-else>
          <div class="navbar-item">
            <router-link :to="{ name: 'sign_in' }" class="button is-text">
              <bd-icon name="sign-in-alt"></bd-icon>
              <span>サインイン</span>
            </router-link>
          </div>
          <div class="navbar-item">
            <router-link :to="{ name: 'sign_up' }" class="button is-text">
              <span class="bd-icon">
                <bd-icon name="user-plus"></bd-icon>
              </span>
              <span>サインアップ</span>
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
    user: Object
  }
  //   },
  //   methods: {
  //     signOut() {
  //       this.$emit("sign-out-clicked");
  //     }
  //   }
};
</script>
