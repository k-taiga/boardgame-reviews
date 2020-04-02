<template>
    <div class="shop-list container">
        <bdBread :ward_id="wardId"></bdBread>
        <bd-search-options @sort="sort"></bd-search-options>
        <div class="grid">
            <shop
                class="grid__item"
                v-for="shop in shops"
                :key="shop.id"
                :item="shop"
                @like="onLikeClick"
            />
        </div>
        <pagination :current-page="currentPage" :last-page="lastPage" />
    </div>
</template>

<script>
import { OK } from "../util";
import shop from "../components/Shop.vue";
import pagination from "../components/Pagination.vue";
import bdCarousel from "../components/Carousel.vue";
import bdSearchBox from "../components/SearchBox.vue";
import bdSearchOptions from "../components/SearchOptions.vue";
import bdBread from "../components/Breadcrumb";

export default {
    components: {
        shop,
        pagination,
        bdCarousel,
        bdSearchBox,
        bdSearchOptions,
        bdBread
    },
    data() {
        return {
            shops: [],
            currentPage: 0,
            lastPage: 0
        };
    },
    props: {
        page: {
            type: Number,
            required: false,
            default: 1
        }
    },
    computed: {
        wardId() {
            return this.$route.params.id;
        }
    },
    methods: {
        async fetchShops() {
            const response = await axios.get(`/api/wards/${this.wardId}`);

            if (response.status !== OK) {
                this.$store.commit("error/setCode", response.status);
                return false;
            }

            console.log(response.data);
            this.shops = response.data.data;
            this.currentPage = response.data.current_page;
            this.lastPage = response.data.last_page;
        },
        onLikeClick({ id, liked }) {
            if (!this.$store.getters["auth/check"]) {
                alert("いいねするにはログインをしてください");
                return false;
            }
            if (liked) {
                this.unlike(id);
            } else {
                this.like(id);
            }
        },
        async like(id) {
            const response = await axios.put(`/api/shops/${id}/like`);

            if (response.status !== OK) {
                this.$store.commit("error/setCode", response.status);
                return false;
            }

            this.shops = this.shops.map(shop => {
                if (shop.id == response.data.shop_id) {
                    shop.likes_count += 1;
                    shop.liked_by_user = true;
                }
                return shop;
            });
        },
        async unlike(id) {
            const response = await axios.delete(`/api/shops/${id}/unlike`);

            if (response.status !== OK) {
                this.$store.commit("error/setCode", response.status);
                return false;
            }

            this.shops = this.shops.map(shop => {
                if (shop.id == response.data.shop_id) {
                    shop.likes_count -= 1;
                    shop.liked_by_user = false;
                }

                return shop;
            });
        },
        async sort(value) {
            console.log(value);

            const sort = value.sort;
            let filter = "";
            filter = {
                boardgame: value.boardgame,
                price: value.price,
                byo_flg: value.byo ? "1" : ""
            };

            console.log(filter);

            // filterは複数の可能性があるため、配列でPOSTする
            if (
                sort !== "" &&
                (filter.boardgame !== "" ||
                    filter.price !== "" ||
                    filter.byo_flg !== "")
            ) {
                console.log("ifの中に通った！");
                const response = await axios.post(
                    `/api/wards/${this.wardId}/${sort}`,
                    filter
                );
                if (response.status !== OK) {
                    this.$store.commit("error/setCode", response.status);
                    return false;
                }
                this.shops = response.data.data;
            } else if (
                // ソートだけ
                sort !== "" &&
                filter.boardgame === "" &&
                filter.price === "" &&
                filter.byo_flg === ""
            ) {
                console.log("1個目のelseifの中に通った！");
                const response = await axios.get(
                    `/api/wards/${this.wardId}/${sort}`
                );
                if (response.status !== OK) {
                    this.$store.commit("error/setCode", response.status);
                    return false;
                }
                this.shops = response.data.data;
            } else if (
                // フィルターだけ
                sort === "" &&
                (filter.boardgame !== "" ||
                    filter.price !== "" ||
                    filter.byo_flg !== "")
            ) {
                console.log("2個目のelseifの中に通った！");
                const response = await axios.post(
                    `/api/wards/${this.wardId}/`,
                    filter
                );
                if (response.status !== OK) {
                    this.$store.commit("error/setCode", response.status);
                    return false;
                }
                this.shops = response.data.data;
            } else if (
                // 全て空の場合は元に戻す
                sort === "" &&
                filter.boardgame === "" &&
                filter.price === "" &&
                filter.byo_flg === ""
            ) {
                console.log("3個目のelseifの中に通った！");
                const response = await axios.get(`/api/wards/${this.wardId}`);

                if (response.status !== OK) {
                    this.$store.commit("error/setCode", response.status);
                    return false;
                }

                this.shops = response.data.data;
            }

            // console.log(this.shops);
        },
        valuecheck() {
            console.log(this.wardId);
        },
        setId() {
            this.$store.commit("ward/setId", this.$route.params.id);
        }
    },
    watch: {
        $route: {
            async handler() {
                await this.fetchShops();
                // this.valuecheck();
                this.setId();
            },
            immediate: true
        }
    }
};
</script>
