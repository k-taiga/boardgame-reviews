<template>
    <div class="photo-list">
        <div class="grid">
            <photo
                class="grid__item"
                v-for="photo in photos"
                :key="photo.id"
                :item="photo"
            />
        </div>
        <pagination :current-page="currentPage" :last-page="lastPage" />
    </div>
</template>

<script>
import { OK } from "../util";
import photo from "../components/Photo.vue";
import pagination from "../components/Pagination.vue";

export default {
    components: {
        photo,
        pagination
    },
    data() {
        return {
            photos: [],
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
    methods: {
        async fetchPhotos() {
            const response = await axios.get(
                `/api/photos/?page=${this.$route.query.page}`
            );

            if (response.status !== OK) {
                this.$store.commit("error/setCode", response.status);
                return false;
            }

            console.log(response.data);
            this.photos = response.data.data;
            this.currentPage = response.data.current_page;
            this.lastPage = response.data.last_page;
        }
    },
    watch: {
        $route: {
            async handler() {
                await this.fetchPhotos();
            },
            immediate: true
        }
    }
};
</script>
