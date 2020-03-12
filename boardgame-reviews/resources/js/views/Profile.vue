<template>
  <div class="container">
    <div class="columns">
      <div class="column is-one-fifth">
        <div class="card">
          <div class="card-content">
            <!-- userのphotoがあれば以下にする -->
            <!-- <figure class="image is-256x256">
                <img
                :src="user.photo.url"
                />
            </figure>-->
            <svg
              aria-hidden="true"
              focusable="false"
              data-prefix="fas"
              data-icon="user-circle"
              class="user_icon"
              role="img"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 496 512"
            >
              <path
                d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 96c48.6 0 88 39.4 88 88s-39.4 88-88 88-88-39.4-88-88 39.4-88 88-88zm0 344c-58.7 0-111.3-26.6-146.5-68.2 18.8-35.4 55.6-59.8 98.5-59.8 2.4 0 4.8.4 7.1 1.1 13 4.2 26.6 6.9 40.9 6.9 14.3 0 28-2.7 40.9-6.9 2.3-.7 4.7-1.1 7.1-1.1 42.9 0 79.7 24.4 98.5 59.8C359.3 421.4 306.7 448 248 448z"
              />
            </svg>

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
          <div class="columns is-multiline" v-if="user.favorite_shops.length > 0">
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
      v-if="user"
      v-model="editProfileModalActive"
      :name="user.name"
      :errors="errors"
      @update="updateProfile"
      @cancel="cancel"
    ></bdProfileEditModal>
    <bdRetireModal v-if="user" v-model="retireModalActive" @retire="retire"></bdRetireModal>
  </div>
</template>

<script>
import { OK, CREATED, UNPROCESSABLE_ENTITY } from "../util";
// import dayjs from "dayjs";
import shop from "../components/FavoriteShop.vue";
import bdProfileEditModal from "../components/ProfileEditModal";
import bdRetireModal from "../components/RetireModal";

export default {
  components: {
    shop,
    bdProfileEditModal,
    bdRetireModal
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
    showRetireModal() {
      this.retireModalActive = true;
    },
    // プロファイル更新処理
    async updateProfile(val) {
      console.log(val.teardown);
      const formData = new FormData();

      formData.append("name", val.name);
      formData.append("photo", val.file);
      console.log(formData);

      const response = await axios.post("/api/profile", formData);
      console.log(response);

      if (response.status === UNPROCESSABLE_ENTITY) {
        this.errors = response.data.errors;
        return false;
      }

      // 更新後のユーザー情報を取得
      this.response = await axios.get(`/api/profile/`);

      //   if (response.status !== OK) {
      //     this.$store.commit("error/setCode", response.status);
      //     return false;
      //   }
      this.user = response.data;
      console.log(this.user);
      // 更新が終了したので終了処理を行う
      if (val.teardown) {
        val.teardown();
      }
    },
    cancel(val) {
      this.errors = val;
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
.user_icon {
  fill: skyblue;
}
.favorite_shops {
  background-color: whitesmoke;
  margin-bottom: 4em;
  padding: 2em;
  border-radius: 0.5em;
}

.favorite_shop {
  background-color: white;
  margin: 0.5em;
  border-radius: 0.5em;
}
</style>
