<template>
  <div class="columns">
    <div
      class="column is-12-mobile is-8-tablet is-offset-2-tablet is-6-desktop is-offset-3-desktop"
    >
      <h2 class="title">Regist shop</h2>
      <form class="form" @submit.prevent="submit">
        <div class="errors" v-if="errors">
          <ul v-if="errors.photo">
            <li v-for="msg in errors.photo" :key="msg">{{ msg }}</li>
          </ul>
          <ul v-if="errors.shop_name">
            <li v-for="msg in errors.shop_name" :key="msg">{{ msg }}</li>
          </ul>
          <ul v-if="errors.address">
            <li v-for="msg in errors.address" :key="msg">{{ msg }}</li>
          </ul>
        </div>
        <input class="form__item" type="file" @change="onFileChange" />
        <output class="form__output" v-if="preview">
          <img :src="preview" alt />
        </output>
        <bdTextField placeholder="店舗名" v-model="shop_form.shopname"></bdTextField>
        <bdTextField placeholder="住所" v-model="shop_form.address"></bdTextField>
        <!-- <bdTextField placeholder="営業時間" v-model="shop_form.bussiness_hours"></bdTextField> -->
        <bdTextField placeholder="ボードゲームの数" v-model="shop_form.boardgame_num"></bdTextField>
        <bdTextField placeholder="説明文" v-model="shop_form.content"></bdTextField>
        <bdTextField placeholder="ホームページ" v-model="shop_form.home_url"></bdTextField>
        <div class="form__button">
          <button type="submit" class="button is-block is-medium is-fullwidth">submit</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { CREATED, UNPROCESSABLE_ENTITY } from "../util";
import bdTextField from "./TextField";
export default {
  name: "shopForm",
  components: { bdTextField },
  data() {
    return {
      preview: null,
      errors: null,
      shop_form: {
        photo: null,
        shopname: null,
        address: null,
        // bussiness_hours: null,
        boardgame_num: null,
        content: null,
        home_url: null
      }
    };
  },
  props: {
    value: {
      value: Boolean,
      required: true
    }
  },
  methods: {
    // formでファイルを選択したら実行
    onFileChange(event) {
      // 何も選択されていなかったら処理中断
      if (event.target.files.length === 0) {
        this.reset();
        return false;
      }

      // ファイルが画像でなくても処理を中断
      if (!event.target.files[0].type.match("image.*")) {
        this.reset();
        return false;
      }

      // FileReaderクラスのインスタンスを取得
      const reader = new FileReader();

      // ファイルを読み込み終わったタイミングで実行する処理
      reader.onload = e => {
        // previewに読み込み結果（データURL）を代入する
        // previewに値が入ると<output>につけたv-ifがtrueと判定される
        // また<output>内部の<img>のsrc属性はpreviewの値を参照しているので
        // 結果として画像が表示される
        this.preview = e.target.result;
      };

      // ファイルを読み込む
      // 読み込まれたファイルはデータURL形式で受け取れる
      reader.readAsDataURL(event.target.files[0]);
      this.shop_form.photo = event.target.files[0];
    },
    reset() {
      this.preview = "";
      this.photo = null;
      // $elはDOMそのものを指す
      this.$el.querySelector('input[type="file"]').value = null;
    },
    async submit() {
      const formData = new FormData();
      formData.append("photo", this.shop_form.photo);
      formData.append("shop_name", this.shop_form.shopname);
      formData.append("address", this.shop_form.address);
      formData.append("boardgame_num", this.shop_form.boardgame_num);
      formData.append("content", this.shop_form.content);
      formData.append("home_url", this.shop_form.home_url);

      console.log(formData);
      const response = await axios.post("/api/shops", formData);
      console.log(response);

      if (response.status === UNPROCESSABLE_ENTITY) {
        this.errors = response.data.errors;
        return false;
      }

      this.reset();
      this.$emit("showForm");

      if (response.status !== CREATED) {
        this.$store.commit("error/setCode", response.status);
        return false;
      }

      this.$store.commit("message/setContent", {
        content: "写真が投稿されました！",
        timeout: 6000
      });

      //   this.$router.push(`/`);
    }
  }
};
</script>

<style scoped>
.column {
  padding: 1em;
  background: hsla(0, 0%, 92%, 0.8);
  text-align: center;
}
.title {
  color: #fff;
}
.button {
  background-color: #5bafc4;
  color: #fff;
}
</style>
