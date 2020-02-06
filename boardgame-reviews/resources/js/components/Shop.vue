<template>
    <div class="photo card">
        <figure class="photo__wrapper image is-4by3">
            <img
                class="photo__image"
                :src="item.url"
                :alt="`Photo by ${item.owner.name}`"
            />
        </figure>
        <div class="media-content">
            <p class="title is-4">JELLY JELLY CAFE 新宿店</p>
            <p class="subtitle is-6">@東京</p>
        </div>
        <div class="content">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus
            nec iaculis mauris. <a>@bulmaio</a>. <a href="#">#css</a>
            <a href="#">#responsive</a>
            <br />
            <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
        </div>
        <RouterLink
            class="photo__overlay"
            :to="`/photos/${item.id}`"
            :title="`View the photo by ${item.owner.name}`"
        >
            <div class="photo__controls">
                <button
                    class="photo__action photo__action--like"
                    :class="{ 'photo__action--liked': item.liked_by_user }"
                    title="Like photo"
                    @click.prevent="like"
                >
                    <bdIcon name="thumbs-up"></bdIcon>{{ item.likes_count }}
                </button>
            </div>
        </RouterLink>
    </div>
</template>

<script>
import bdIcon from "./Icon";
export default {
    components: { bdIcon },
    props: {
        item: {
            type: Object,
            required: true
        }
    },
    methods: {
        like() {
            this.$emit("like", {
                id: this.item.id,
                liked: this.item.liked_by_user
            });
        }
    }
};
</script>
