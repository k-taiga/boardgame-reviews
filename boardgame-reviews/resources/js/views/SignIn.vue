<template>
  <div class="hero is-light is-fullheight">
    <div class="hero-body">
      <div class="container has-text-centered">
        <form class="form" @submit.prevent="login">
          <div class="column is-4 is-offset-4">
            <div class="box">
              <transition name="error">
                <div v-if="loginErrors" class="errors">
                  <ul v-if="loginErrors.email">
                    <li v-for="msg in loginErrors.email" :key="msg">{{ msg }}</li>
                  </ul>
                  <ul v-if="loginErrors.password">
                    <li v-for="msg in loginErrors.password" :key="msg">{{ msg }}</li>
                  </ul>
                </div>
              </transition>
              <bdTextField
                type="email"
                placeholder="メールアドレス"
                icon="envelope"
                v-model="loginForm.email"
              ></bdTextField>
              <!-- パスワードの入力欄としてテキストフィールドコンポーネントを使用 -->
              <bdTextField
                type="password"
                placeholder="パスワード"
                icon="lock"
                v-model="loginForm.password"
              ></bdTextField>
              <button
                class="button is-block is-info is-large is-fullwidth"
                @click="clearError"
              >ログインする</button>
            </div>
          </div>
        </form>
        <p class="has-text-grey">
          <a href="..">パスワードを忘れた方はこちら</a>
        </p>
      </div>
    </div>
  </div>
</template>

<script>
import bdTextField from "../components/TextField";

export default {
  name: "sign_in",
  components: { bdTextField },
  data() {
    return {
      loginForm: {
        email: "",
        password: ""
      }
    };
  },
  computed: {
    apiStatus() {
      return this.$store.state.auth.apiStatus;
    },
    loginErrors() {
      return this.$store.state.auth.loginErrorMessages;
    }
  },
  watch: {
    $route() {
      // ルートの変更の検知...
    }
  },
  methods: {
    async login() {
      //   authストアのloginメソッド
      await this.$store.dispatch("auth/login", this.loginForm);
      if (this.apiStatus) {
        this.$router.push("/");
        this.loginMessage();
      }
    },
    clearError() {
      this.$store.commit("auth/setLoginErrorMessages", null);
    },
    loginMessage() {
      this.$notify({
        title: "ログインしました",
        type: "success",
        position: "bottom-left",
        showClose: false
      });
    }
  },
  created() {
    this.clearError();
  }
};
</script>

<style scoped>
.error-enter,
.error-leave-to {
  opacity: 0;
}
.error-enter-to,
.error-leave {
  opacity: 1;
}
.error-enter-active,
.error-leave-active {
  transition: opacity 1s;
}

.hero-body {
  background: url("https://boardgame-reviews.s3-ap-northeast-1.amazonaws.com/images/background.jpg")
    center bottom / cover;
}
</style>
