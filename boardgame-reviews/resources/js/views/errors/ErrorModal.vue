<template>
    <div class="modal" :class="{ 'is-active': this.active }">
        <div class="modal-background" @click="closeErrorModal" />
        <div class="modal-content">
            <div class="notification is-danger">
                <button
                    class="delete"
                    aria-label="close"
                    @click="closeErrorModal"
                />
                {{ this.message }}
            </div>
        </div>
    </div>
</template>

<script>
import { NOT_FOUND, UNAUTHORIZED, INTERNAL_SERVER_ERROR } from "../../util";

export default {
    name: "error-modal",
    data() {
        return {
            message: null,
            code: null,
            active: false
        };
    },
    computed: {
        Code() {
            const response = this.$store.state.error.code;
            return response;
            // console.log(response);
        }
    },
    watch: {
        Code: {
            handler(val) {
                if (val !== "") {
                    this.active = true;
                }

                if (val === INTERNAL_SERVER_ERROR) {
                    this.message = "システムエラーが発生しました。";
                } else if (val === UNAUTHORIZED) {
                    this.message = "システムエラーが発生しました。";
                } else if (val === NOT_FOUND) {
                    this.message = "お探しのページが見つかりません。";
                }
            }
        }
    },
    methods: {
        closeErrorModal() {
            this.active = false;
        }
    }
};
</script>
