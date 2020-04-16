<template>
  <div class="columns">
    <div
      class="column is-12-mobile is-8-tablet is-offset-2-tablet is-6-desktop is-offset-3-desktop"
    >
      <h2 class="title">Regist shop</h2>
      <!-- <form class="form" @submit.prevent="submit"> -->
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
      <!-- <bdTextField placeholder="店舗名" v-model="shop_form.shopname"></bdTextField>
		<bdTextField placeholder="住所" v-model="shop_form.address"></bdTextField>
		<bdTextField placeholder="ボードゲームの数" v-model="shop_form.boardgame_num"></bdTextField>
		<bdTextField placeholder="説明文" v-model="shop_form.content"></bdTextField>
		<bdTextField placeholder="ホームページ" v-model="shop_form.home_url"></bdTextField>
		<div class="form__button">
		  <button type="submit" class="button is-block is-medium is-fullwidth">submit</button>
		</div>
      </form>-->
      <el-form :model="register_form" :rules="rules" ref="register_form" label-width="120px">
        <input class="form__item" type="file" @change="onFileChange" />
        <output class="form__output" v-if="preview">
          <img :src="preview" alt />
        </output>
        <el-form-item label="店舗名" prop="name">
          <el-input v-model="register_form.name"></el-input>
        </el-form-item>
        <el-form-item label="住所" prop="address">
          <el-input v-model="register_form.address"></el-input>
        </el-form-item>
        <el-form-item label="東京23区" prop="wards">
          <el-select v-model="register_form.wards" placeholder="千代田区">
            <el-option v-for="ward in wards" :key="ward.id" :value="ward.name">{{ward.name}}</el-option>
          </el-select>
        </el-form-item>
        <el-form-item label="BYO" prop="byo">
          <el-tooltip content="持ち込み可かどうか選択して下さい" placement="top" effect="light">
            <span class="icon is-small">
              <i class="far fa-question-circle"></i>
            </span>
          </el-tooltip>
          <el-switch v-model="register_form.byo"></el-switch>
        </el-form-item>
        <el-form-item label="ボードゲーム数" prop="boardgame_num">
          <el-input v-model="register_form.boardgame_num"></el-input>
        </el-form-item>
        <el-form-item label="HOME URL" prop="home_url">
          <el-input v-model="register_form.home_url"></el-input>
        </el-form-item>
        <el-form-item label="予算" prop="price">
          <el-input v-model="register_form.price"></el-input>
        </el-form-item>
        <el-form-item label="紹介文" prop="content">
          <el-input type="textarea" v-model="register_form.content"></el-input>
        </el-form-item>
        <el-form-item>
          <el-button type="submit" @click="submitForm('register_form')">Submit</el-button>
          <el-button @click="resetForm('register_form')">Reset</el-button>
        </el-form-item>
      </el-form>
    </div>
  </div>
</template>

<script>
import { CREATED, UNPROCESSABLE_ENTITY, OK } from "../util";
import bdTextField from "./TextField";
export default {
  name: "shopForm",
  components: { bdTextField },
  data() {
    return {
      preview: null,
      errors: null,
      wards: [],
      shop_form: {
        photo: null,
        shopname: null,
        address: null,
        boardgame_num: null,
        content: null,
        home_url: null
      },
      register_form: {
        photo: null,
        name: "",
        address: "",
        wards: "",
        byo: false,
        boardgame_num: "",
        home_url: "",
        price: "",
        content: ""
      },
      rules: {
        name: [
          {
            required: true,
            message: "店舗名を入力してください",
            trigger: "blur"
          },
          {
            min: 1,
            max: 32,
            message: "32文字以内で入力してください",
            trigger: "blur"
          }
        ],
        address: [
          {
            required: true,
            message: "住所を入力してください",
            trigger: "blur"
          }
        ],
        wards: [
          {
            required: true,
            message: "23区を入力してください",
            trigger: "blur"
          }
        ],
        boardgame_num: [
          {
            required: true,
            message: "ボードゲームの数を入力してください",
            trigger: "blur"
          }
        ],
        home_url: [
          {
            required: true,
            message: "URLを入力してください",
            trigger: "blur"
          }
        ],
        price: [
          {
            required: true,
            message: "予算を入力してください",
            trigger: "blur"
          }
        ],
        content: [
          {
            required: true,
            message: "紹介文を入力してください",
            trigger: "blur"
          }
        ]
      }
    };
  },
  filters: {
    toWardName: function(val) {}
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
      this.register_form.photo = event.target.files[0];
    },
    async submit() {
      let ward_name = this.register_form.wards;
      let ward_id;
      this.wards.forEach(function(ward) {
        if (ward.name == ward_name) {
          ward_id = ward.id;
        }
      });

      let byo_flg = this.register_form ? 1 : 0;
      const formData = new FormData();

      formData.append("photo", this.register_form.photo);
      formData.append("shop_name", this.register_form.name);
      formData.append("address", this.register_form.address);
      formData.append("ward_id", ward_id);
      formData.append("byo_flg", byo_flg);
      formData.append("boardgame_num", this.register_form.boardgame_num);
      formData.append("home_url", this.register_form.home_url);
      formData.append("price", this.register_form.price);
      formData.append("content", this.register_form.content);

      const response = await axios.post("/api/shops", formData);
      console.log(response);

      if (response.status === UNPROCESSABLE_ENTITY) {
        this.errors = response.data.errors;
        return false;
      }

      if (response.status !== CREATED) {
        this.$store.commit("error/setCode", response.status);
        return false;
      }

      this.resetForm("register_form");
      alert("submit!");
    },
    submitForm(formName) {
      this.$refs[formName].validate(valid => {
        if (valid) {
          this.submit();
        } else {
          return false;
        }
      });
    },
    resetForm(formName) {
      this.$refs[formName].resetFields();
      this.preview = "";
      this.photo = null;
      // $elはDOMそのものを指す
      this.$el.querySelector('input[type="file"]').value = null;
    },
    async fetchWards() {
      const response = await axios.get(`/api/wards/`);

      if (response.status !== OK) {
        this.$store.commit("error/setCode", response.status);
        return false;
      }

      this.wards = response.data;
    }
  },
  created() {
    this.fetchWards();
  }
};
//   methods: {
//     // formでファイルを選択したら実行
//     onFileChange(event) {
//       // 何も選択されていなかったら処理中断
//       if (event.target.files.length === 0) {
//         this.reset();
//         return false;
//       }

//       // ファイルが画像でなくても処理を中断
//       if (!event.target.files[0].type.match("image.*")) {
//         this.reset();
//         return false;
//       }

//       // FileReaderクラスのインスタンスを取得
//       const reader = new FileReader();

//       // ファイルを読み込み終わったタイミングで実行する処理
//       reader.onload = e => {
//         // previewに読み込み結果（データURL）を代入する
//         // previewに値が入ると<output>につけたv-ifがtrueと判定される
//         // また<output>内部の<img>のsrc属性はpreviewの値を参照しているので
//         // 結果として画像が表示される
//         this.preview = e.target.result;
//       };

//       // ファイルを読み込む
//       // 読み込まれたファイルはデータURL形式で受け取れる
//       reader.readAsDataURL(event.target.files[0]);
//       this.shop_form.photo = event.target.files[0];
//     },
//     reset() {
//       this.preview = "";
//       this.photo = null;
//       // $elはDOMそのものを指す
//       this.$el.querySelector('input[type="file"]').value = null;
//     },
//     async submit() {
//       const formData = new FormData();
//       formData.append("photo", this.shop_form.photo);
//       formData.append("shop_name", this.shop_form.shopname);
//       formData.append("address", this.shop_form.address);
//       formData.append("boardgame_num", this.shop_form.boardgame_num);
//       formData.append("content", this.shop_form.content);
//       formData.append("home_url", this.shop_form.home_url);

//       console.log(formData);
//       const response = await axios.post("/api/shops", formData);
//       console.log(response);

//       if (response.status === UNPROCESSABLE_ENTITY) {
//         this.errors = response.data.errors;
//         return false;
//       }

//       this.reset();
//       this.$emit("showForm");

//       if (response.status !== CREATED) {
//         this.$store.commit("error/setCode", response.status);
//         return false;
//       }

//       this.$store.commit("message/setContent", {
//         content: "写真が投稿されました！",
//         timeout: 6000
//       });

//   this.$router.push(`/`);
// }
//   }
// };
</script>

<style scoped>
h2 {
  text-align: center;
}

.form__item {
  padding-top: 0.5em;
  padding-right: 0.75em;
  padding-bottom: 0.5em;
  padding-left: 2em;
  border: 1px solid transparent;
}
.column {
  padding: 1em;
  background: hsla(0, 0%, 92%, 0.8);
}
.title {
  color: #fff;
}
</style>
