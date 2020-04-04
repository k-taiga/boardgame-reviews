<template>
  <div class="hero is-fullheight">
    <div class="hero-body">
      <div class="container">
        <h2 class="title is-1 is-spaced has-text-centered">あなたのお店もぜひ紹介してください！</h2>
        <shopForm />
      </div>
    </div>
  </div>
</template>

<script>
import shopForm from "../components/ShopForm.vue";
export default {
  data() {
    return {
      show: true
    };
  },
  components: { shopForm },
  methods: {
    showForm() {
      this.show = !this.show;
    }
  }
};
</script>

<style scoped>
.hero-body {
  background: url("https://boardgame-reviews.s3-ap-northeast-1.amazonaws.com/images/background.jpg")
    center bottom / cover;
}
.title {
  color: whitesmoke;
}
</style>
