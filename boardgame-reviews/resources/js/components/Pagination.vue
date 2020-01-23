<template>
    <div class="pagination">
        <router-link
            v-if="!isFirstPage"
            :to="`/?page=${currentPage - 1}`"
            class="button"
            >&laquo; 前のページ</router-link
        >
        <router-link
            v-if="!isLastPage"
            :to="`/?page=${currentPage + 1}`"
            class="button"
            >次のページ &raquo;</router-link
        >
    </div>
</template>

<script>
export default {
    name: "pagination",
    props: {
        currentPage: {
            type: Number,
            required: true
        },
        lastPage: {
            type: Number,
            required: true
        }
    },
    computed: {
        isFirstPage() {
            return this.currentPage === 1;
        },
        isLastPage() {
            return this.currentPage === this.lastPage;
        }
    }
};
</script>
