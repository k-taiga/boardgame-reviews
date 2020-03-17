<template>
  <section id="search-box" class="section intro has-text-centered">
    <h1 class="title is-2">お気に入りのボードゲームカフェを探そう！</h1>
    <form action="/search">
      <div class="field is-grouped-centered is-grouped-multiline is-grouped">
        <div class="autocomplete control">
          <div class="control has-icons-left is-medium is-clearfix">
            <input
              type="text"
              autocomplete="off"
              name="location"
              placeholder="JELLY JELLY CAFE新宿"
              class="input is-medium"
            />
            <span class="icon is-left">
              <bdIcon name="search"></bdIcon>
            </span>
          </div>
        </div>
        <p class="control">
          <button class="button is-medium has-text-white">Search</button>
        </p>
      </div>
      <p>
        <!-- <a
            href="https://www.receptionhalls.com/banquet-halls"
          >review our banquet hall directory organized by state</a>
        </p>-->
      </p>
    </form>
  </section>
</template>

<script>
import bdIcon from "./Icon";
export default {
  components: {
    bdIcon
  }
};
</script>

<style scoped>
.button.is-medium {
  background-color: #5bafc4;
}
</style>
