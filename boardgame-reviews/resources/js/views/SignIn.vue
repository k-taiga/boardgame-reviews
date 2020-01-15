<template>
  <div class="hero is-light is-fullheight">
    <div class="hero-body">
      <div class="container has-text-centered">
        <article v-show="errorMessage" class="message is-warning">
          <div class="message-body">{{ error_message }}</div>
        </article>
        <form class="form" @submit.prevent="login">
          <div class="column is-4 is-offset-4">
            <div class="box">
              <div v-if="loginErrors" class="errors">
                <ul v-if="loginErrors.email">
                  <li v-for="msg in loginErrors.email" :key="msg">{{ msg }}</li>
                </ul>
                <ul v-if="loginErrors.password">
                  <li v-for="msg in loginErrors.password" :key="msg">{{ msg }}</li>
                </ul>
              </div>
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
              <div class="field">
                <label class="checkbox">
                  <input type="checkbox" />
                  ログインしたままにする
                </label>
              </div>
              <button class="button is-block is-info is-large is-fullwidth">ログインする</button>
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
import { mapState } from "vuex";

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
  methods: {
    async login() {
      //   authストアのloginメソッド
      await this.$store.dispatch("auth/login", this.loginForm);
      if (this.apiStatus) {
        this.$router.push("/");
      }
    },
    clearError() {
      this.$store.commit("auth/setLoginErrorMessages", null);
    }
  },
  created() {
    this.clearError;
  },
  beforeMount() {
    this.clearError;
  }
};
</script>
