<template>
  <div id="app">
    <bdNavbar :user="user"></bdNavbar>
    <main>
      <router-view />
    </main>
  </div>
</template>

<script>
// ここではパスカルケースだけどtemplate内はケバブケース
import bdNavbar from "./components/Navbar.vue";

export default {
  name: "app",
  components: { bdNavbar },
  data() {
    return {
      user: null
    };
  }
};
</script>
