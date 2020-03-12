<template>
  <!-- Bulma のモーダルダイアログは is-active クラスをつけると表示 -->
  <div class="modal" :class="{ 'is-active': active }">
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">プロフィール編集</p>
        <!-- 右上の x ボタンにモーダルダイアログを閉じるイベントを指定します -->
        <button class="delete" aria-label="close" @click="cancel"></button>
      </header>
      <section class="modal-card-body">
        <pm-text-field
          type="text"
          label="ユーザー名"
          placeholder="ユーザー名"
          :error="userNameError"
          v-model="userName"
        />
        <div class="field">
          <label class="label">アバター画像</label>
          <div class="control">
            <div class="file has-name">
              <label class="file-label">
                <!-- type=file な input タグは readonly なため v-model は使用できない。change イベントで値を処理 -->
                <span class="file-cta">
                  <span class="file-icon">
                    <i class="fas fa-upload"></i>
                  </span>
                  <span class="file-label">Choose a file...</span>
                  <input class="file-input" type="file" name="resume" @change="onFileChange" />
                </span>
                <!-- ファイルが選択された時だけファイル名を表示 -->
                <span class="file-name">{{ avatarFile ? avatarFile.name : "" }}</span>
              </label>
            </div>
          </div>
        </div>
        <output class="form__output" v-if="preview">
          <img :src="preview" alt />
        </output>
      </section>
      <footer class="modal-card-foot">
        <!-- 更新ボタンのclickイベント発行 -->
        <button class="button is-primary" @click="update">更新</button>
        <button class="button" @click="cancel">キャンセル</button>
      </footer>
    </div>
  </div>
</template>

<script>
import pmTextField from "./TextField";
export default {
  name: "pm-profile-edit-modal",
  components: { pmTextField },
  props: {
    name: String,
    value: Boolean
  },
  data() {
    return {
      // 初期表示を親コンポーネントから渡されたユーザー名にするために this.name で初期化
      userName: this.name,
      userNameError: null,
      avatarFile: null,
      preview: null,
      errors: null
    };
  },
  computed: {
    // v-modelに関するプロパティはactive
    active: {
      get() {
        return this.value;
      },
      set(val) {
        if (this.value !== val) {
          this.$emit("input", val);
        }
      }
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
    update() {
      if (!this.userName) {
        this.userNameError = "ユーザー名は必須です";
        return;
      }
      // updateイベントを発行
      this.$emit("update", {
        name: this.userName,
        file: this.avatarFile,
        // 正常終了後の後処理を teardown として渡し
        // 名前だけ更新後のものにしてモーダルダイアログを非表示する
        teardown: () => {
          this.userNameError = null;
          this.avatarFile = null;
          this.active = false;
        }
      });
    },
    cancel() {
      // 再表示されたときに現在のデータを表示しないように初期状態に戻す
      this.userName = this.name;
      this.userNameError = null;
      this.avatarFile = null;
      // 閉じるためには active プロパティを false にする
      // active プロパティの set が呼び出され親コンポーネントに波及
      this.active = false;
    },
    selectFile(e) {
      // ファイルを保持する
      this.avatarFile = e.target.files[0];
    }
  }
};
</script>
