<template>
  <div class="container">
    <!-- <div class="columns" v-if="profile"> -->
    <div class="columns">
      <div class="column is-one-fifth">
        <p class="image is-128x128">
          <img :src="profile.avatarUrl || profile.gravatarUrl" />
        </p>
        <p>name: {{ profile.name }}</p>
      </div>
      <div class="column is-for-fifths">
        <div class="card" v-for="shop in shops" :key="shop.id">
          <div class="card-content">
            <div class="content">
              <div>
                <a :href="shop.home_url">{{ shop.shop_name }}</a>
              </div>
              <div>{{ shop.likes_count }}</div>
              <div>
                <!-- <time
                  class="is-size-7"
                  :datetime="formatTime(shop.created_at)"
                >{{ formatTime(shop.created_at) }}</time>-->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
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
      bookmarks: []
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
