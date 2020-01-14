<template>
    <div class="field">
        <!-- ラベルの文字列が指定されたときだけ表示します -->
        <label class="label" v-if="label">{{ label }}</label>
        <!-- icon が指定されたときだけ必要なクラスを設定します -->
        <div class="control" :class="{ 'has-icons-left': icon }">
            <input
                class="input"
                :type="type"
                :placeholder="placeholder"
                :value="value"
                @input="input"
            />
            <!-- アイコンが指定されたときだけ表示します -->
            <bdIcon v-if="icon" class="is-small is-left" :name="icon"></bdIcon>
        </div>
    </div>
</template>

<script>
import bdIcon from "./Icon";

export default {
    name: "bdTextField",
    components: { bdIcon },
    props: {
        type: {
            type: String,
            label: String,
            default: "text",
            validator(val) {
                return ["text", "email", "password", "search", "url"].includes(
                    val
                );
            }
        },
        placeholder: String,
        value: String,
        icon: String
    },
    methods: {
        input(e) {
            if (e.target.value !== this.value) {
                this.$emit("input", e.target.value);
            }
        }
    }
};
</script>
