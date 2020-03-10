<template>
  <div class="container">
    <div class="columns">
      <div class="column is-one-fifth">
        <div class="card">
          <div class="card-content">
            <figure class="image is-256x256">
              <img
                src="https://gravatar.com/avatar/7c838f7ca2f3ccff7a160d3a9698afc2?s=400&d=robohash&r=x"
              />
            </figure>
            <p v-if="user" class="subtitle has-text-centered has-text-dark">name:&emsp;{{user.name}}</p>
          </div>
          <footer class="card-footer">
            <p class="card-footer-item">
              <span>編集</span>
            </p>
            <p class="card-footer-item">
              <span>退会</span>
            </p>
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
          <div class="columns is-multiline">
            <shop
              v-for="shop in user.favorite_shops"
              :key="shop.id"
              :item="shop"
              class="favorite_shop"
            />
          </div>
        </div>
      </div>
    </div>
    <pm-profile-edit-modal
      v-if="profile"
      v-model="editProfileModalActive"
      :name="profile.name"
      @update="updateProfile"
    ></pm-profile-edit-modal>
    <pm-retire-modal v-if="profile" v-model="retireModalActive" @retire="retire"></pm-retire-modal>
  </div>
</template>

<script>
import { OK, CREATED, UNPROCESSABLE_ENTITY } from "../util";
// import dayjs from "dayjs";
import shop from "../components/FavoriteShop.vue";

export default {
  components: {
    shop
  },
  name: "profile",
  data() {
    return {
      user: null,
      profile: null,
      like_shops: []
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
