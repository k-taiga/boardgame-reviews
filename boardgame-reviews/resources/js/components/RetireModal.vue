<template>
  <div class="modal" :class="{ 'is-active': active }">
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">退会しますか?</p>
        <button class="delete" aria-label="close" @click="cancel"></button>
      </header>
      <section class="modal-card-body">
        <div class="errors" v-if="errors">
          <ul v-if="errors.password">
            <li v-for="msg in errors.password" :key="msg">{{ msg }}</li>
          </ul>
        </div>
        <div
          class="notification is-danger"
        >退会するには現在のパスワードを入力して「退会する」ボタンをクリックしてください。この処理は元に戻すことはできません。</div>
        <bd-text-field
          label="現在のパスワード（必須）"
          type="password"
          placeholder="パスワード"
          icon="key"
          v-model="password"
        ></bd-text-field>
      </section>
      <footer class="modal-card-foor">
        <button class="button is-danger" @click="retire">退会する</button>
        <button class="button" @click="cancel">キャンセル</button>
      </footer>
    </div>
  </div>
</template>

<script>
import bdTextField from "./TextField";
export default {
  name: "bd-retire-modal",
  components: { bdTextField },
  props: {
    errors: Object,
    active: Boolean
  },
  data() {
    return {
      password: null,
      active: this.active
    };
  },
  methods: {
    retire() {
      if (!this.password) {
        this.errors.password = "パスワードを入力してください";
        return;
      }
      this.$emit("retire", {
        password: this.password
        // teardown: this.cancel
      });
    },
    cancel() {
      this.password = null;
      this.passwordError = null;
      this.active = false;
      this.$emit("cancel");
    }
  }
};
</script>
