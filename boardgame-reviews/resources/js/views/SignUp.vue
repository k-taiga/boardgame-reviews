<template>
  <div class="hero is-light is-fullheight">
    <div class="hero-body">
      <div class="container has-text-centered">
        <article v-show="errorMessage" class="message is-warning">
          <div class="message-body">{{ error_message }}</div>
        </article>
        <form class="form" @submit.prevent="signUp">
          <div class="column is-4 is-offset-4">
            <div class="box">
              <div v-if="registerErrors" class="errors">
                <ul v-if="registerErrors.name">
                  <li v-for="msg in registerErrors.name" :key="msg">{{ msg }}</li>
                </ul>
                <ul v-if="registerErrors.email">
                  <li v-for="msg in registerErrors.email" :key="msg">{{ msg }}</li>
                </ul>
                <ul v-if="registerErrors.password">
                  <li v-for="msg in registerErrors.password" :key="msg">{{ msg }}</li>
                </ul>
              </div>
              <bdTextField
                type="text"
                placeholder="username"
                icon="signature"
                v-model="registerForm.name"
              ></bdTextField>
              <bdTextField
                type="email"
                placeholder="メールアドレス"
                icon="envelope"
                v-model="registerForm.email"
              ></bdTextField>
              <!-- パスワードの入力欄としてテキストフィールドコンポーネントを使用 -->
              <bdTextField
                type="password"
                placeholder="パスワード"
                icon="lock"
                v-model="registerForm.password"
              ></bdTextField>
              <bdTextField
                type="password"
                placeholder="パスワード確認"
                icon="lock"
                v-model="registerForm.password_confirmation"
              ></bdTextField>
              <div class="field">
                <label class="checkbox">
                  <input type="checkbox" />
                  ログインしたままにする
                </label>
              </div>
              <button class="button is-block is-info is-large is-fullwidth" type="submit">登録する</button>
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
import bdTextField from "../components/TextField.vue";

export default {
  name: "sign_up",
  components: { bdTextField },
  data() {
    return {
      registerForm: {
        name: "",
        email: "",
        password: "",
        password_confirmation: ""
      }
    };
  },
  computed: {
    apiStatus() {
      return this.$store.state.auth.apiStatus;
    },
    registerErrors() {
      console.log(this.$store.state.auth.registerErrorMessages);
      return this.$store.state.auth.registerErrorMessages;
    }
  },
  methods: {
    async signUp() {
      // authストアのregisterアクションを呼び出す
      // app.jsでstore(Vuex)をimportしているためthis.$storeでストアを参照できる
      // console.log(this.registerForm);
      await this.$store.dispatch("auth/register", this.registerForm);

      if (this.apiStatus) {
        // トップページに移動する
        this.$router.push("/");
      }
    },
    clearError() {
      this.$store.commit("auth/setRegisterErrorMessages", null);
    }
  },
  created() {
    this.clearError;
  }
};
</script>
