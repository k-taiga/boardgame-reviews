<template>
    <div class="container">
        <div class="hero is-fullheight">
            <button
                class="button is-info is-rounded is-hovered"
                @click="showForm"
            >
                <i class="icon ion-md-add"></i>
                Submit a photo
            </button>
            <div class="hero-body">
                <photoForm v-model="show" />
            </div>
        </div>
    </div>
</template>

<script>
import photoForm from "../components/PhotoForm.vue";
export default {
    data() {
        return {
            show: false
        };
    },
    components: { photoForm },
    methods: {
        showForm() {
            this.show = !this.show;
        }
    }
};
</script>
