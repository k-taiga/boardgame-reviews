<template>
  <div id="app">
    <bdNavbar :user="user"></bdNavbar>
    <main>
      <router-view />
    </main>
    <bdFooter></bdFooter>
  </div>
</template>

<script>
import bdNavbar from "./components/Navbar.vue";
import bdFooter from "./components/Footer.vue";

export default {
  name: "app",
  components: { bdNavbar, bdFooter },
  data() {
    return {
      user: null
    };
  }
};
</script>
