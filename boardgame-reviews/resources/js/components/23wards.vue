<template>
  <div class="navbar-start">
    <div class="navbar-item has-dropdown is-hoverable">
      <a class="navbar-link has-text-white">BodogeCafe by 23区</a>
      <div class="navbar-dropdown is-size-6" style="width: 50rem;">
        <ul class="wards">
          <li v-for="ward in wards" :key="ward.id">
            <RouterLink :to="`/wards/${ward.id}`">{{ward.name}}</RouterLink>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
import { OK } from "../util";
export default {
  data() {
    return {
      wards: []
    };
  },
  methods: {
    async fetchWards() {
      const response = await axios.get(`/api/wards/`);

      if (response.status !== OK) {
        this.$store.commit("error/setCode", response.status);
        return false;
      }

      console.log(response.data);
      this.wards = response.data;
    }
  },
  created() {
    this.fetchWards();
  }
};
</script>

<style scoped>
a {
  color: #a6d4cc;
}
.navbar-dropdown {
  background-color: #fff;
  border-bottom-left-radius: 6px;
  border-bottom-right-radius: 6px;
  border-top: 2px solid #dbdbdb;
  -webkit-box-shadow: 0 8px 8px hsla(0, 0%, 4%, 0.1);
  box-shadow: 0 8px 8px hsla(0, 0%, 4%, 0.1);
  display: none;
  font-size: 0.875rem;
  left: 0;
  min-width: 100%;
  position: absolute;
  top: 100%;
  z-index: 20;
}
ul.wards {
  max-height: 150px;
  z-index: 99;
  width: 100%;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
}
ul.wards li {
  font-size: 1.1rem;
  padding-left: 1rem;
  margin: 0 1rem 0.25rem 0;
}
</style>
