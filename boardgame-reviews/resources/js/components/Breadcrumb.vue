<template>
  <section class="section is-hidden-print">
    <nav class="level">
      <div class="level-left">
        <div class="level-item">
          <nav aria-label="breadcrumbs" class="breadcrumb">
            <ul>
              <li>
                <RouterLink :to="`/`">Home</RouterLink>
              </li>
              <li v-if="shop">
                <RouterLink :to="`/shops/${shop.id}`">{{shop.shop_name}}</RouterLink>
              </li>
              <li v-if="profile">
                <RouterLink :to="`/profile`">プロフィール</RouterLink>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </nav>
  </section>
</template>

<script>
export default {
  props: {
    shop: Object,
    wards: String,
    profile: Object
  },
  data() {
    return {};
  },
  methods: {
    valuecheck() {
      console.log(this.shop);
    }
  },
  watch: {
    $route: {
      handler() {
        this.valuecheck();
      },
      immediate: true
    }
  }
};
</script>

<style scoped>
a {
  color: #69569c;
  font-weight: bold;
}
</style>
