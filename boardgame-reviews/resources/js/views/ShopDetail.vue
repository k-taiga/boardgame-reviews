<template>
  <div v-if="photo" class="photo-detail container" :class="{ 'photo-detail--column': fullWidth }">
    <figure class="photo-detail__pane photo-detail__image image" @click="active = !active">
      <img :src="photo.url" alt />
      <figcaption>Posted by {{ photo.owner.name }}</figcaption>
    </figure>
    <div class="photo-detail__pane">
      <!-- photoのliked_by_userがtrueになればクラスが変わる -->
      <button
        class="button button--like"
        :class="{ 'photo__action--liked': photo.liked_by_user }"
        title="Like photo"
        @click="onLikeClick"
      >
        <bdIcon name="thumbs-up"></bdIcon>
        {{ photo.likes_count }}
      </button>
      <h2 class="photo-detail__title">
        <i class="icon ion-md-chatboxes"></i>Reviews
      </h2>
      <ul v-if="photo.reviews.length > 0" class="photo-detail__reviews">
        <li v-for="(review, index) in photo.reviews" :key="index" class="photo-detail__commentItem">
          <p class="photo-detail__commentBody">{{ review.content }}</p>
          <p class="photo-detail__commentInfo">{{ review.author.name }}</p>
        </li>
      </ul>
      <p v-else>No reviews yet.</p>
      <form @submit.prevent="addReview" class="form" v-if="isLogin">
        <div v-if="reviewErrors" class="errors">
          <ul v-if="reviewErrors.content">
            <li v-for="msg in reviewErrors.content" :key="msg">{{ msg }}</li>
          </ul>
        </div>
        <textarea class="form__item" v-model="reviewContent"></textarea>
        <div class="form__button">
          <button type="submit" class="button button--inverse">レビューを投稿する</button>
        </div>
      </form>
    </div>
    <div class="modal" :class="{ 'is-active': active }">
      <div class="modal-background"></div>
      <div class="modal-content">
        <p class="image is-4by3">
          <img :src="photo.url" alt />
        </p>
      </div>
      <button class="modal-close is-large" aria-label="close" @click="active = false"></button>
    </div>
  </div>
</template>

<script>
import { OK, CREATED, UNPROCESSABLE_ENTITY } from "../util";
import bdIcon from "../components/Icon";

export default {
  components: { bdIcon },
  props: {
    id: {
      type: String,
      required: true
    }
  },
  data() {
    return {
      photo: null,
      fullWidth: false,
      reviewContent: "",
      reviewErrors: null,
      active: false
    };
  },
  computed: {
    isLogin() {
      return this.$store.getters["auth/check"];
    }
  },
  methods: {
    async fetchPhoto() {
      const response = await axios.get(`/api/photos/${this.id}`);

      //   console.log(response);
      if (response.status !== OK) {
        this.$store.commit("error/setCode", response.status);
        return false;
      }

      this.photo = response.data;
    },
    async addReview() {
      const response = await axios.post(`/api/photos/${this.id}/reviews`, {
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

      this.fetchPhoto();
    },
    onLikeClick() {
      if (!this.isLogin) {
        alert("いいね機能を使うにはログインしてください。");
        return false;
      }

      if (this.photo.liked_by_user) {
        this.unlike();
      } else {
        this.like();
      }
    },
    async like() {
      const response = await axios.put(`/api/photos/${this.id}/like`);

      if (response.status !== OK) {
        this.$store.commit("error/setCode", response.status);
        return false;
      }

      this.photo.likes_count = this.photo.likes_count + 1;
      this.photo.liked_by_user = true;
    },
    async unlike() {
      const response = await axios.delete(`/api/photos/${this.id}/unlike`);

      if (response.status !== OK) {
        this.$store.commit("error/setCode", response.status);
        return false;
      }

      this.photo.likes_count = this.photo.likes_count - 1;
      this.photo.liked_by_user = false;
    }
  },
  watch: {
    $route: {
      async handler() {
        await this.fetchPhoto();
      },
      immediate: true
    }
  }
};
</script>
