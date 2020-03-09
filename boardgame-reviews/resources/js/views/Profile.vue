<template>
  <div class="container">
    <div class="columns">
      <div class="column is-one-fifth">
        <div class="card">
          <div class="card-content">
            <figure class="image is-256x256">
              <img
                src="https://gravatar.com/avatar/7c838f7ca2f3ccff7a160d3a9698afc2?s=400&d=robohash&r=x"
              />
            </figure>
            <p class="subtitle">name:</p>
          </div>
          <footer class="card-footer">
            <p class="card-footer-item">
              <span>編集</span>
            </p>
            <p class="card-footer-item">
              <span>退会</span>
            </p>
          </footer>
        </div>

        <!-- </article> -->
        <!-- </div> -->
      </div>
      <div class="column is-for-fifths">
        <!-- <div class="card" v-for="b in bookmarks" :key="b.id">
          <div class="card-content">
            <div class="content">
              <div>
                <a :href="b.url">{{ b.title }}</a>
              </div>
              <div>{{ b.comment }}</div>
              <div>
                <time
                  class="is-size-7"
                  :datatime="formatTime(b.bookmarkedAt)"
                >{{ formatTime(b.bookmarkedAt) }}</time>
              </div>
            </div>
          </div>
        </div>-->
      </div>
    </div>
    <pm-profile-edit-modal
      v-if="profile"
      v-model="editProfileModalActive"
      :name="profile.name"
      @update="updateProfile"
    ></pm-profile-edit-modal>
    <pm-retire-modal v-if="profile" v-model="retireModalActive" @retire="retire"></pm-retire-modal>
  </div>
</template>

<script>
// import dayjs from "dayjs";

export default {
  name: "profile",
  data() {
    return {
      user: null,
      profile: null,
      like_shops: []
    };
  }
  //   ,
  //   async created() {
  //     authService.onStateChanged(async user => {
  //       this.user = user;
  //       // サインインしていなければ不要な処理なので if の中に閉じ込めておきます
  //       if (user) {
  //         this.profile = await userService.getCurrentUser();
  //         this.bookmarks = await userBookmarkService.getBookmarks(this.profile);
  //       }
  //     });
  //   },
  //   methods: {
  //     formatTime(dateTime) {
  //       return dayjs(dateTime).format("YYYY-MM-DD HH:mm");
  //     }
  //   }
};
</script>
