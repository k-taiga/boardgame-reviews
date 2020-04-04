<template>
  <div class="navbar-item">
    <div class="field is-grouped">
      <p class="control">
        <a
          class="bd-tw-button button"
          data-social-network="Twitter"
          data-social-action="tweet"
          data-social-target="https://bodoge-cafe-reviews.work"
          target="_blank"
          href="https://twitter.com/intent/tweet?text=ボードゲームカフェのレビューができるサイトです！ ぜひ使ってください！;hashtags=&amp;url=https://bodoge-cafe-reviews.work&amp;"
        >
          <span class="icon">
            <i class="fab fa-twitter"></i>
          </span>
          <span>Tweet</span>
        </a>
      </p>
    </div>
  </div>
</template>

<script>
export default {
  name: "Tweet"
};
</script>

<style scoped>
.bd-tw-button {
  background-color: #55acee;
  color: white;
}
</style>
