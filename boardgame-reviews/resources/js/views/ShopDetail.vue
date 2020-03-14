<template>
  <div class="container">
    <bdBack></bdBack>
    <div v-if="shop" class="photo-detail container" :class="{ 'photo-detail--column': fullWidth }">
      <figure class="photo-detail__pane photo-detail__image image" @click="active = !active">
        <div class="level-left">
          <div class="level-item">
            <p class="heading">Boardgames</p>
            <p class="title">{{ shop.boardgame_num }}</p>
          </div>
          <div class="level-item">
            <p class="heading">Followers</p>
            <p class="title">{{ shop.likes_count }}</p>
          </div>
          <div class="level-item">
            <p class="heading">Reviews</p>
            <p class="title">{{ shop.reviews.length }}</p>
          </div>
        </div>
        <img :src="shop.photos.url" alt />
      </figure>
      <div class="tile is-vertical is-6">
        <div class="tile">
          <div class="tile is-parent is-vertical">
            <article class="tile is-child box">
              <p class="title has-text-centered">{{ shop.shop_name }}</p>
              <p class="subtitle has-text-centered">{{ shop.address }}</p>
              <p class="content has-text-centered">{{ shop.content }}</p>
              <!-- Put any content you want -->
              <!-- <div class="photo-detail__pane"> -->
              <!-- photoのliked_by_userがtrueになればクラスが変わる -->
              <!-- <button
              class="button button--like"
              :class="{ 'photo__action--liked': shop.liked_by_user }"
              title="Like shop"
              @click="onLikeClick"
            >
              <bdIcon name="thumbs-up"></bdIcon>
              {{ shop.likes_count }}
              </button>-->
              <h2 class="photo-detail__title">
                <i class="icon ion-md-chatboxes"></i>Review
              </h2>
              <div class="infinite-list-wrapper" :style="styleObject">
                <ul
                  v-if="count >= 0"
                  class="photo-detail__reviews list"
                  v-infinite-scroll="load"
                  infinite-scroll-disabled="disabled"
                >
                  <li
                    v-for="(review, index) in shop.reviews"
                    :key="index"
                    class="photo-detail__commentItem list-item"
                  >
                    <article class="media">
                      <figure v-if="review.author.photos" class="media-left">
                        <p class="image is-64x64">
                          <img :src="review.author.photos.url" />
                        </p>
                      </figure>
                      <el-avatar
                        v-if="review.author.photos == null"
                        :size="50"
                        src="https://cube.elemecdn.com/3/7c/3ea6beec64369c2642b92c6726f1epng.png"
                      ></el-avatar>

                      <div class="media-content">
                        <div class="content">
                          <p>
                            <strong>
                              {{
                              review.author.name
                              }}
                            </strong>
                            <small>{{ review.date }}</small>
                            <br />
                            {{ review.content }}
                          </p>
                        </div>
                      </div>
                    </article>
                  </li>
                </ul>
                <p v-if="loading">Loading...</p>
                <p v-if="noMore">No more</p>
              </div>
              <p v-if="shop.reviews.length == 0" class="has-text-left">
                <strong>まだレビューがありません！</strong>
              </p>
              <form @submit.prevent="addReview" class="form" v-if="isLogin">
                <div v-if="reviewErrors" class="errors">
                  <ul v-if="reviewErrors.content">
                    <li v-for="msg in reviewErrors.content" :key="msg">{{ msg }}</li>
                  </ul>
                </div>
                <article class="media">
                  <figure class="media-left">
                    <figure v-if="user.photos" class="media-left">
                      <p class="image is-64x64">
                        <img :src="user.photos.url" />
                      </p>
                    </figure>
                    <el-avatar
                      v-if="user.photos == null"
                      :size="50"
                      src="https://cube.elemecdn.com/3/7c/3ea6beec64369c2642b92c6726f1epng.png"
                    ></el-avatar>
                  </figure>
                  <div class="media-content">
                    <div class="field">
                      <p class="control">
                        <textarea
                          class="textarea"
                          placeholder="レビューを投稿してください！"
                          v-model="reviewContent"
                        ></textarea>
                      </p>
                    </div>
                    <nav class="level">
                      <div class="level-right">
                        <div class="level-item">
                          <!-- <a class="button is-info">Submit</a> -->
                          <!-- <textarea class="form__item"></textarea> -->
                          <div class="form__button">
                            <button type="submit" class="button button--inverse">レビューを投稿する</button>
                          </div>
                        </div>
                      </div>
                    </nav>
                  </div>
                </article>
              </form>
              <footer class="card-footer">
                <div class="card-footer-item">
                  <span class="icon is-small">
                    <i class="fas fa-globe" aria-hidden="true"></i>
                  </span>
                  <span>
                    View on
                    <a
                      :href="shop.home_url"
                      target="_blank"
                      rel="noopener noreferrer"
                    >Official</a>
                  </span>
                </div>
                <div href="#" class="card-footer-item">
                  <span class="icon is-small">
                    <i class="fab fa-twitter-square" aria-hidden="true"></i>
                  </span>
                  <span>
                    Share on
                    <a href="#">Twitter</a>
                  </span>
                </div>
              </footer>
            </article>
          </div>
        </div>
      </div>

      <div class="modal" :class="{ 'is-active': active }">
        <div class="modal-background"></div>
        <div class="modal-content">
          <p class="image is-4by3">
            <img :src="shop.photos.url" alt />
          </p>
        </div>
        <button class="modal-close is-large" aria-label="close" @click="active = false"></button>
      </div>
    </div>
  </div>
</template>

<script>
import { OK, CREATED, UNPROCESSABLE_ENTITY } from "../util";
import bdIcon from "../components/Icon";
import bdBack from "../components/Back";
import bdUserIcon from "../components/UserSvg";

export default {
  components: { bdIcon, bdBack, bdUserIcon },
  props: {
    id: {
      type: String,
      required: true
    }
  },
  data() {
    return {
      shop: null,
      fullWidth: false,
      reviewContent: "",
      reviewErrors: null,
      active: false,
      count: 0,
      loading: false,
      user: null
    };
  },
  computed: {
    isLogin() {
      return this.$store.getters["auth/check"];
    },
    noMore() {
      if (this.count !== 0) {
        return this.count == this.shop.reviews.length;
      }
      return false;
    },
    disabled() {
      return this.loading || this.noMore;
    },
    styleObject: function() {
      if (this.shop.reviews != "") {
        return {
          height: "400px",
          "overflow-y": "scroll"
        };
      } else {
        return false;
      }
    }
  },
  methods: {
    async fetchShop() {
      const response = await axios.get(`/api/shops/${this.id}`);

      if (response.status !== OK) {
        this.$store.commit("error/setCode", response.status);
        return false;
      }

      this.shop = response.data;
      console.log(this.shop);
    },
    async addReview() {
      const response = await axios.post(`/api/shops/${this.id}/reviews`, {
        content: this.reviewContent
      });

      // バリデーションエラー
      if (response.status === UNPROCESSABLE_ENTITY) {
        this.reviewErrors = response.data.errors;
        return false;
      }

      this.reviewContent = "";

      this.reviewErroros = null;

      // その他のエラー
      if (response.status !== CREATED) {
        this.$store.commit("error/setCode", response.status);
        return false;
      }

      this.fetchShop();
    },
    onLikeClick() {
      if (!this.isLogin) {
        alert("いいね機能を使うにはログインしてください。");
        return false;
      }

      if (this.shop.liked_by_user) {
        this.unlike();
      } else {
        this.like();
      }
    },
    async like() {
      const response = await axios.put(`/api/shops/${this.id}/like`);

      if (response.status !== OK) {
        this.$store.commit("error/setCode", response.status);
        return false;
      }

      this.shop.likes_count = this.shop.likes_count + 1;
      this.shop.liked_by_user = true;
    },
    async unlike() {
      const response = await axios.delete(`/api/shops/${this.id}/unlike`);

      if (response.status !== OK) {
        this.$store.commit("error/setCode", response.status);
        return false;
      }

      this.shop.likes_count = this.shop.likes_count - 1;
      this.shop.liked_by_user = false;
    },
    load() {
      this.loading = true;
      setTimeout(() => {
        if (this.shop.reviews.length >= this.count) {
          this.count += 1;
        }
        this.loading = false;
      }, 1000);
    },
    async fetchUser() {
      const response = await axios.get(`/api/profile/`);

      if (response.status !== OK) {
        this.$store.commit("error/setCode", response.status);
        return false;
      }
      this.user = response.data;
    }
  },
  watch: {
    $route: {
      async handler() {
        await this.fetchShop();
        await this.fetchUser();
      },
      immediate: true
    }
  }
};
</script>
