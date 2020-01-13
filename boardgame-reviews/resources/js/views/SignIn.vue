<template>
    <div class="hero is-light is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <article v-show="errorMessage" class="message is-warning">
                    <div class="message-body">{{ error_message }}</div>
                </article>
                <form class="form" @submit.prevent="signUp">
                    <div class="column is-4 is-offset-4">
                        <div class="box">
                            <bdTextField
                                type="email"
                                placeholder="メールアドレス"
                                icon="envelope"
                                v-model="email"
                            ></bdTextField>
                            <!-- パスワードの入力欄としてテキストフィールドコンポーネントを使用 -->
                            <bdTextField
                                type="password"
                                placeholder="パスワード"
                                icon="lock"
                                v-model="password"
                            ></bdTextField>
                            <div class="field">
                                <label class="checkbox">
                                    <input type="checkbox" />
                                    ログインしたままにする
                                </label>
                            </div>
                            <button
                                class="button is-block is-info is-large is-fullwidth"
                                @click.prevent="signIn"
                            >
                                ログインする
                            </button>
                        </div>
                    </div>
                </form>
                <p class="has-text-grey">
                    <a href="..">パスワードを忘れた方はこちら</a>
                </p>
            </div>
        </div>
    </div>
</template>

<script>
import bdTextField from "../components/TextField";

export default {
    name: "sign_in",
    components: { bdTextField },
    data() {
        return {
            email: "",
            password: "",
            error_message: null
        };
    },
    methods: {
        login() {
            this.$store.dispatch("auth/create", {
                user: {
                    email: this.email,
                    password: this.password
                }
            });
        },
        signIn(e) {
            alert(`Email: ${this.email}, Password: ${this.password}`);
            this.email = null;
            this.password = null;
        }
    }
};
</script>
