<template>
  <div v-show="value" class="photo-form">
    <h2 class="title">Submit a shop</h2>
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
      <bdTextField placeholder="店舗名" v-model="shopname"></bdTextField>
      <bdTextField placeholder="住所" v-model="address"></bdTextField>
      <div class="form__button">
        <button type="submit" class="button button--inverse">submit</button>
      </div>
    </form>
  </div>
</template>

<script>
import { CREATED, UNPROCESSABLE_ENTITY } from "../util";
import bdTextField from "./TextField";
export default {
  name: "photoForm",
  components: { bdTextField },
  data() {
    return {
      preview: null,
      photo: null,
      errors: null,
      shopname: null,
      address: null
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
      this.photo = event.target.files[0];
    },
    reset() {
      this.preview = "";
      this.photo = null;
      // $elはDOMそのものを指す
      this.$el.querySelector('input[type="file"]').value = null;
    },
    async submit() {
      const formData = new FormData();
      formData.append("photo", this.photo);
      formData.append("shop_name", this.shopname);
      formData.append("address", this.address);
    //   const response = await axios.post("/api/photos", formData);
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
