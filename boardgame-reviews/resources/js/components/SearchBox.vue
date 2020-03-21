<template>
    <section id="search-box" class="section intro has-text-centered">
        <h1 class="title is-2">お気に入りのボードゲームカフェを探そう！</h1>
        <form id="searchform" @submit.prevent="submit">
            <div
                class="field is-grouped-centered is-grouped-multiline is-grouped"
            >
                <div class="autocomplete control">
                    <div class="control has-icons-left is-medium is-clearfix">
                        <vue-simple-suggest
                            v-model="selected"
                            :list="simpleSuggestionList"
                            :filter-by-query="true"
                            class="input is-medium"
                            placeholder="JELLY JELLY CAFE新宿"
                            type="text"
                        >
                        </vue-simple-suggest>
                        <span class="icon is-left">
                            <bdIcon name="search"></bdIcon>
                        </span>
                    </div>
                </div>
                <p class="control">
                    <button
                        type="submit"
                        class="button is-medium has-text-white"
                    >
                        Search
                    </button>
                </p>
            </div>
        </form>
    </section>
</template>

<script>
import bdIcon from "./Icon";
import VueSimpleSuggest from "vue-simple-suggest";
import "vue-simple-suggest/dist/styles.css";

export default {
    components: {
        bdIcon,
        VueSimpleSuggest
    },
    props: {
        // shops: Array,
        simpleSuggestionList: Array
    },
    data() {
        return {
            selected: null,
            shops: this.shops
        };
    },
    methods: {
        submit() {
            if (this.selected == "") {
                this.$emit("fetchShops");
            } else {
                this.$emit("search", this.selected);
            }
        }
    }
};
</script>

<style scoped>
.button.is-medium {
    background-color: #5bafc4;
}
</style>
