<template>
  <span class="icon">
    <i :class="['fas', nameClass]"></i>
  </span>
</template>

<script>
export default {
  name: "bd-icon",
  props: { name: String },
  // computedはpropsを動的に返す
  computed: {
    nameClass() {
      return `fa-${this.name}`;
    }
  }
};
</script>
