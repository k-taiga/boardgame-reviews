<template>
  <div class="container">
    <bdBread></bdBread>
    <div class="columns">
      <div class="column is-one-fifth">
        <div class="card">
          <div class="card-content">
            <!-- userのphotoがあれば以下にする -->
            <figure v-if="user.icon_url" class="image is-4by3">
              <img :src="user.icon_url" />
            </figure>
            <bdUserIcon v-if="user.icon_url == ''|| user.icon_url == null"></bdUserIcon>
            <p
              v-if="user"
              class="subtitle has-text-centered has-text-dark"
            >name:&emsp;{{ user.name }}</p>
          </div>
          <footer class="card-footer">
            <button
              class="button is-small is-primary is-outlined is-fullwidth"
              @click="showProfileEditModal"
            >編集</button>
            <button
              class="button is-small is-primary is-outlined is-fullwidth"
              @click="showRetireModal"
            >退会</button>
          </footer>
        </div>
      </div>
      <div class="column is-for-fifths">
        <div class="credential">
          <div class="level">
            <div class="level-left">
              <div class="level-item">
                <h2 class="title is-6 has-text-left">認証情報変更</h2>
              </div>
            </div>
          </div>
          <transition name="error">
            <div v-if="credentialForm.errors" class="errors">
              <ul v-if="credentialForm.errors.msg">
                <li>{{ credentialForm.errors.msg }}</li>
              </ul>
              <!-- <ul v-if="credentialForm.errors.email">
                <li v-for="msg in loginErrors.email" :key="msg">{{ msg }}</li>
              </ul>
              <ul v-if="credentialForm.errors.password">
                <li v-for="msg in loginErrors.password" :key="msg">{{ msg }}</li>
              </ul>-->
              <ul v-if="credentialForm.errors.null">
                <li>{{ credentialForm.errors.null }}</li>
              </ul>
            </div>
          </transition>
          <bdTextField
            type="password"
            placeholder="現在のパスワード（必須）"
            icon="key"
            v-model="credentialForm.currentPassword"
          ></bdTextField>
          <bdTextField
            type="email"
            placeholder="新しいメールアドレス"
            icon="envelope"
            v-model="credentialForm.email"
          ></bdTextField>
          <bdTextField
            type="password"
            placeholder="新しいパスワード"
            icon="lock"
            v-model="credentialForm.password"
          ></bdTextField>
          <div class="field is-grouped">
            <div class="control">
              <button class="button is-primary" @click.prevent="updateCredential">更新</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <bdProfileEditModal
      v-model="editProfileModalActive"
      :active="editProfileModalActive"
      :name="user.name"
      :errors="errors"
      @update="updateProfile"
      @cancel="cancel"
    ></bdProfileEditModal>
    <bdRetireModal
      v-model="retireModalActive"
      :active="retireModalActive"
      :errors="errors"
      @retire="retire"
      @cancel="cancel"
    ></bdRetireModal>
  </div>
</template>

<script>
import { OK, CREATED, UNPROCESSABLE_ENTITY } from "../util";
// import dayjs from "dayjs";
import shop from "../components/FavoriteShop.vue";
import bdProfileEditModal from "../components/ProfileEditModal";
import bdRetireModal from "../components/RetireModal";
import bdUserIcon from "../components/UserSvg";
import bdBread from "../components/Breadcrumb";
import bdTextField from "../components/TextField";

export default {
  components: {
    shop,
    bdProfileEditModal,
    bdRetireModal,
    bdUserIcon,
    bdBread,
    bdTextField
  },
  name: "profile",
  data() {
    return {
      user: null,
      errors: null,
      editProfileModalActive: false,
      retireModalActive: false,
      credentialFlg: this.$route.params.credential_flg,
      credentialForm: {
        currentPassword: "",
        email: "",
        password: "",
        errors: ""
      }
    };
  },
  methods: {
    async fetchUser() {
      const response = await axios.get(`/api/profile`);

      if (response.status !== OK) {
        this.$store.commit("error/setCode", response.status);
        return false;
      }

      this.user = response.data;
      // // this.$set(this.user, "icon_url", this.user.icon_url);
      // this.user = Object.assign({}, this.user);
      // this.user = Object.assign({}, this.user, {
      //     icon_url: this.user.icon_url
      // });
    },
    // プロファイル編集ダイアログ表示・非表示の切り替え処理
    showProfileEditModal() {
      this.editProfileModalActive = true;
    },

    // プロファイル削除ダイアログ表示・非表示の切り替え処理
    showRetireModal() {
      this.retireModalActive = true;
    },
    // プロファイル更新処理
    async updateProfile(val) {
      const formData = new FormData();

      formData.append("name", val.name);
      formData.append("photo", val.file);

      const response = await axios.post("/api/profile/edit", formData);

      if (response.status === UNPROCESSABLE_ENTITY) {
        this.errors = response.data.errors;
        return false;
      }

      // 更新後のユーザー情報を取得
      this.fetchUser();
      this.reload();

      // 更新が終了したので終了処理を行う
      if (val.teardown) {
        val.teardown();
      }

      this.editProfileModalActive = false;
    },
    async retire(val) {
      const formData = new FormData();
      formData.append("password", val.password);
      const response = await axios.post("/api/profile/destroy", formData);

      if (response.status === UNPROCESSABLE_ENTITY) {
        this.errors = response.data.errors;
        return false;
      } else if (response.status === 403) {
        this.errors = response.data.message;
        return false;
      }

      this.$store.commit("message/setContent", {
        content: "ご利用ありがとうございました！",
        timeout: 6000
      });

      this.$router.push(`/`);
    },
    // componentのエラ-を消去
    cancel() {
      this.errors = null;
      this.editProfileModalActive = false;
      this.retireModalActive = false;
    },
    // リロードしてS3の画像を更新する
    reload() {
      this.$router.go({
        path: this.$router.currentRoute.path,
        force: true
      });
    },
    async updateCredential() {
      if (this.credentialForm.email || this.credentialForm.password) {
        const response = await axios.post(
          "/api/profile/credential",
          this.credentialForm
        );

        if (response.status === UNPROCESSABLE_ENTITY) {
          this.credentialForm.errors = response.data.errors;
          return false;
        } else if (response.status === 403) {
          this.credentialForm.errors = { msg: response.data.message };
          return false;
        }

        this.clearForm();
        alert("認証情報を変更しました！");
        // this.$router.push(`/profile`);
      } else {
        // alert(
        //   "新しいメールアドレスか新しいパスワードのどちらかは入力してください"
        // );
        this.credentialForm.errors = {
          null:
            "　新しいメールアドレスか新しいパスワードのどちらかは入力してください"
        };
      }
    },
    valuecheck() {
      //   console.log(this.credentialFlg);
    },
    clearForm() {
      this.credentialForm.errors = "";
      this.credentialForm.currentPassword = "";
      this.credentialForm.email = "";
      this.credentialForm.password = "";
    }
  },
  watch: {
    $route: {
      async handler() {
        await this.fetchUser();
        this.valuecheck();
      },
      immediate: true
    }
  }
  //   methods: {
  //     formatTime(dateTime) {
  //       return dayjs(dateTime).format("YYYY-MM-DD HH:mm");
  //     }
  //   }
};
</script>

<style scoped>
.favorite_shops {
  background-color: white;
  margin-bottom: 4em;
  padding: 2em;
  border-radius: 0.5em;
}

.credential {
  background-color: white;
  margin-bottom: 4em;
  padding: 2em;
  border-radius: 0.5em;
}

.favorite_shop {
  background-color: whitesmoke;
  margin: 0.5em;
  border-radius: 0.5em;
}
</style>
