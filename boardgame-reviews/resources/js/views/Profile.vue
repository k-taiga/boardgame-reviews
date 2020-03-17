<template>
  <div class="container">
    <div class="columns">
      <div class="column is-one-fifth">
        <div class="card">
          <div class="card-content">
            <!-- userのphotoがあれば以下にする -->
            <figure v-if="user.photos" class="image is-4by3">
              <img :src="user.photos.url" />
            </figure>
            <bdUserIcon v-if="user.photos == null"></bdUserIcon>

            <p v-if="user" class="subtitle has-text-centered has-text-dark">name:&emsp;{{user.name}}</p>
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

        <!-- </article> -->
        <!-- </div> -->
      </div>
      <div class="column is-for-fifths">
        <div class="favorite_shops">
          <div class="level">
            <div class="level-left">
              <div class="level-item">
                <h2 class="title is-6 has-text-left">Favorite Shops</h2>
              </div>
            </div>
          </div>
          <div class="columns is-multiline" v-if="user.favorite_shops.count !== 0 ">
            <shop
              v-for="shop in user.favorite_shops"
              :key="shop.id"
              :item="shop"
              class="favorite_shop"
            />
          </div>
          <p v-if="user.favorite_shops.length === 0" class="has-text-left">
            <strong>まだお気に入りはありません。</strong>
          </p>
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

export default {
  components: {
    shop,
    bdProfileEditModal,
    bdRetireModal,
    bdUserIcon
  },
  name: "profile",
  data() {
    return {
      user: null,
      errors: null,
      editProfileModalActive: false,
      retireModalActive: false
    };
  },
  methods: {
    async fetchUser() {
      const response = await axios.get(`/api/profile/`);

      if (response.status !== OK) {
        this.$store.commit("error/setCode", response.status);
        return false;
      }
      this.user = response.data;
      console.log(this.user);
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

      console.log(response);

      if (response.status === UNPROCESSABLE_ENTITY) {
        this.errors = response.data.errors;
        return false;
      }

      // 更新後のユーザー情報を取得
      this.fetchUser();

      console.log(this.user);

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

      console.log(response);

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
    }
  },

  watch: {
    $route: {
      async handler() {
        await this.fetchUser();
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

.favorite_shop {
  background-color: whitesmoke;
  margin: 0.5em;
  border-radius: 0.5em;
}
</style>
