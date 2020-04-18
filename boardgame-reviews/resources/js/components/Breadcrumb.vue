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
              <li v-if="ward_id">
                <template v-for="ward in wards">
                  <RouterLink v-if="ward.id == ward_id" :to="`/wards/${ward.id}`">{{ward.name}}</RouterLink>
                </template>
              </li>
              <li v-if="shop">
                <RouterLink :to="`/shops/${shop.id}`">{{shop.shop_name}}</RouterLink>
              </li>
              <li v-if="url == `/profile`">
                <RouterLink :to="`/profile`">プロフィール</RouterLink>
              </li>
              <li v-if="url == `/credential`">
                <RouterLink :to="`/credential`">認証情報変更</RouterLink>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </nav>
  </section>
</template>

<script>
import { OK } from "../util";
export default {
  props: {
    shop: Object,
    ward_id: String
  },
  data() {
    return {
      wards: [],
      url: this.$route.path
    };
  },
  methods: {
    // valuecheck() {
    //   console.log(this.ward_id);
    // },
    async fetchWards() {
      const response = await axios.get(`/api/wards`);

      if (response.status !== OK) {
        this.$store.commit("error/setCode", response.status);
        return false;
      }

      this.wards = response.data;
    }
  },
  //   watch: {
  //     $route: {
  //       handler() {
  //         this.valuecheck();
  //       },
  //       immediate: true
  //     }
  //   },
  created() {
    this.fetchWards();
  }
};
</script>

<style scoped>
a {
  color: #69569c;
  font-weight: bold;
}
</style>
