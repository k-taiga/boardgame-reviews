<template>
    <nav class="level search-options">
        <div class="level-left">
            <div class="level-item">
                <div class="field has-text-white">Sort By:</div>
            </div>
            <div class="level-item">
                <div class="field">
                    <div class="control has-icons-left">
                        <span class="select is-empty">
                            <select>
                                <option
                                    disabled="disabled"
                                    hidden="hidden"
                                    selected
                                    >ソート順</option
                                >
                                <option value="reviews">レビュー数</option>
                                <option value="follower">フォロワー数</option>
                                <option value="Price">Price</option>
                            </select>
                        </span>
                        <span class="icon is-left">
                            <i class="fas fa-sort-amount-up"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="level-right">
            <div class="level-item">
                <div class="field has-text-white">Filter By:</div>
            </div>
            <div class="level-item">
                <div class="field">
                    <div class="control has-icons-left">
                        <span class="select is-empty">
                            <select>
                                <option
                                    disabled="disabled"
                                    hidden="hidden"
                                    selected
                                    >ボードゲームの数</option
                                >
                                <option value="1">0~100</option>
                                <option value="2">100~300</option>
                                <option value="3">300個以上</option>
                            </select>
                        </span>
                        <span class="icon is-left">
                            <i class="fas fa-sort-numeric-down-alt"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="level-item">
                <div class="field">
                    <div class="control has-icons-left">
                        <span class="select is-empty">
                            <select>
                                <option
                                    disabled="disabled"
                                    hidden="hidden"
                                    selected
                                    >予算</option
                                >
                                <option value="1000">1,000</option>
                                <option value="2000">2,000</option>
                                <option value="3000">3,000以上</option>
                            </select>
                        </span>
                        <span class="icon is-left">
                            <i class="fas fa-money-bill-wave"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="level-item">
                <div class="field">
                    <label class="switch">
                        <span class="check">
                            <el-switch
                                v-model="value2"
                                active-color="#13ce66"
                                inactive-color="#b5b5b5"
                            ></el-switch>
                        </span>
                        <span class="control-label">
                            &nbsp;BYO
                            <span
                                data-label="Banquet halls that allow you to bring your own caterer."
                                class="is-light is-bottom is-small b-tooltip is-animated is-multiline"
                            >
                                <el-tooltip
                                    content="持ち込み可のお店を探します。"
                                    placement="top"
                                    effect="light"
                                >
                                    <el-button>
                                        <span class="icon is-small">
                                            <i
                                                class="far fa-question-circle"
                                            ></i>
                                        </span>
                                    </el-button>
                                </el-tooltip>
                            </span>
                        </span>
                    </label>
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    data() {
        return {
            value2: false
        };
    }
};
</script>

<style scoped>
.search-options {
    background-color: #5bafc4;
    padding: 1rem;
}

.select.is-empty select {
    color: gray;
}

.select select option {
    color: #4a4a4a;
    padding: 0.25em 0.5em;
}

.level-item {
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-preferred-size: auto;
    flex-basis: auto;
    -webkit-box-flex: 0;
    -ms-flex-positive: 0;
    flex-grow: 0;
    -ms-flex-negative: 0;
    flex-shrink: 0;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
}

.switch {
    cursor: pointer;
    display: -webkit-inline-box;
    display: -ms-inline-flexbox;
    display: inline-flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

.switch input[type="checkbox"] + .check {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -ms-flex-negative: 0;
    flex-shrink: 0;
    width: 2.75em;
    height: 1.575em;
    padding: 0.2em;
    background: #b5b5b5;
    border-radius: 1em;
    -webkit-transition: background 0.15s ease-out;
    transition: background 0.15s ease-out;
}

.el-button {
    padding: 0;
    background-color: #5bafc4;
    border: 1px solid #5bafc4;
}
</style>
