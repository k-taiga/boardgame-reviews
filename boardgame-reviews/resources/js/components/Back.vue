<template>
  <el-page-header @back="goBack" title="Back"></el-page-header>
</template>

<script>
export default {
  methods: {
    goBack() {
      console.log("go back");
      this.$router.push("/");
    }
  }
};
</script>
