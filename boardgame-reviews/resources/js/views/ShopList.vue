<template>
  <div class="shop-list container">
    <bd-search-box @search="search"></bd-search-box>
    <div class="grid">
      <shop
        class="grid__item"
        v-for="shop in shops"
        :key="shop.id"
        :item="shop"
        @like="onLikeClick"
      />
    </div>
    <pagination :current-page="currentPage" :last-page="lastPage" />
  </div>
</template>

<script>
import { OK } from "../util";
import shop from "../components/Shop.vue";
import pagination from "../components/Pagination.vue";
import bdCarousel from "../components/Carousel.vue";
import bdSearchBox from "../components/SearchBox.vue";
import bdSearchOptions from "../components/SearchOptions.vue";

export default {
  components: {
    shop,
    pagination,
    bdCarousel,
    bdSearchBox,
    bdSearchOptions
  },
  data() {
    return {
      shops: [],
      currentPage: 0,
      lastPage: 0
    };
  },
  props: {
    page: {
      type: Number,
      required: false,
      default: 1
    }
  },
  methods: {
    async fetchShops() {
      const response = await axios.get(
        `/api/shops/?page=${this.$route.query.page}`
      );

      if (response.status !== OK) {
        this.$store.commit("error/setCode", response.status);
        return false;
      }

      console.log(response.data);
      this.shops = response.data.data;
      this.currentPage = response.data.current_page;
      this.lastPage = response.data.last_page;
    },
    onLikeClick({ id, liked }) {
      if (!this.$store.getters["auth/check"]) {
        alert("いいねするにはログインをしてください");
        return false;
      }
      if (liked) {
        this.unlike(id);
      } else {
        this.like(id);
      }
    },
    async like(id) {
      const response = await axios.put(`/api/shops/${id}/like`);

      if (response.status !== OK) {
        this.$store.commit("error/setCode", response.status);
        return false;
      }

      this.shops = this.shops.map(shop => {
        if (shop.id == response.data.shop_id) {
          shop.likes_count += 1;
          shop.liked_by_user = true;
        }
        return shop;
      });
    },
    async unlike(id) {
      const response = await axios.delete(`/api/shops/${id}/unlike`);

      if (response.status !== OK) {
        this.$store.commit("error/setCode", response.status);
        return false;
      }

      this.shops = this.shops.map(shop => {
        if (shop.id == response.data.shop_id) {
          shop.likes_count -= 1;
          shop.liked_by_user = false;
        }

        return shop;
      });
    },
    async search(keyword) {
      console.log(keyword);

      const response = await axios.post(`/api/shops/${keyword}`);

      if (response.status !== OK) {
        this.$store.commit("error/setCode", response.status);
        return false;
      }

      this.shops = response.data;
      console.log(this.shops);
    },
    setId() {
      this.$store.commit("ward/setId", null);
    }
  },
  watch: {
    $route: {
      async handler() {
        await this.fetchShops();
        this.setId();
      },
      immediate: true
    }
  }
};
</script>
