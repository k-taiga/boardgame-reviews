<template>
  <div v-if="item" class="card is-shadowless is-slightly-rounded">
    <RouterLink :to="`/shops/${item.id}`" :title="`View ${item.shop_name}`">
      <div class="card-image">
        <figure class="image is-4by3">
          <a href="#">
            <img :src="item.photos.url" :alt="`${item.shop_name}`" class="photo__image" />
          </a>
        </figure>
      </div>
      <div class="media-content">
        <div class="content">
          <p>
            <span class="title is-6 is-capitalized">{{item.shop_name}}</span>
            <br />
            <span class="title is-7">{{item.address}}</span>
          </p>
        </div>
      </div>
    </RouterLink>
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
.card {
  width: 30%;
}
.is-slightly-rounded {
  border-radius: 2%;
}
</style>
