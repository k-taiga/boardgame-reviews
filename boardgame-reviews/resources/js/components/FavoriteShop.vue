<template>
  <div class="card is-shadowless is-slightly-rounded">
    <div class="card-image">
      <figure class="image is-4by3">
        <a href="#">
          <img
            src="https://s3-ap-northeast-1.amazonaws.com/boardgame-reviews/rkHCC5OlJnO2.jpeg"
            alt="test shop"
            class="is-slightly-rounded"
          />
        </a>
      </figure>
    </div>
    <div class="card-content">
      <div class="content">
        <p>
          <span class="title is-4 is-capitalized">
            <a href class="has-text-black">BrighterDaze Farm</a>
          </span>
          <br />
          <span class="m-t-tiny block">Newark, IL</span>
        </p>
      </div>
    </div>
  </div>
</template>

<script>
import bdIcon from "./Icon";
export default {
  components: { bdIcon },
  props: {
    item: {
      type: Object,
      required: true
    }
  },
  methods: {
    like() {
      this.$emit("like", {
        id: this.item.id,
        liked: this.item.liked_by_user
      });
    }
  }
};
</script>
<style scoped>
.title,
.subtitle,
.content {
  font-family: Merriweather;
}
</style>
