<script setup lang="ts">
import { navMainStore } from '@/stores/navMain';
import { onUnmounted, ref, watch } from 'vue';
const navMainState = navMainStore();
const props = defineProps<{
    img: string[]
}>();
const isActive = ref(false);
const currentIndex = ref(0);
const toggleActive = (force: boolean) => {
    if (force) {
        navMainState.hide = force;
        return isActive.value = force;

    }

    isActive.value = !isActive.value;
    navMainState.hide = isActive.value;
    return isActive.value;
}
const exitClick = () => {
    toggleActive(false);
};

const setIndex = (index: number) => {
    if (index >= props.img.length || index < 0) {
        throw new Error(`index ${index} is Invalid`);
    }

    currentIndex.value = index;
};
const nextImage = () => {
    currentIndex.value++;
}

const prevImage = () => {
    currentIndex.value--;
}
defineExpose({
    toggleActive,
    isActive,
    setIndex
});
onUnmounted(() => {
    document.body.classList.remove('overflow-hidden');
});
watch(isActive, () => {
    document.body.classList.toggle('overflow-hidden', isActive.value);
});
</script>
<template>
    <div class="img-detail " v-if="isActive">
        <button class="text-white flex justify-content-end mt-2 md:px-4 px-3 btn-exit" @click="exitClick">
            <i class="bi bi-x-lg text-3xl"></i>
        </button>
        <div class="h-full relative md:px-4 px-3">
            <button class="prev-button" v-if="currentIndex > 0" @click="prevImage">
                <i class="bi bi-chevron-left"></i>
            </button>
            <div class="img-detail-content h-full flex align-items-center">
                <img :src="props.img[currentIndex]" class="w-full" />
            </div>
            <button class="next-button" v-if="currentIndex < props.img.length - 1" @click="nextImage">
                <i class="bi bi-chevron-right">
                </i>
            </button>
        </div>
    </div>
</template>

<style scoped>
.btn-exit {
    border: none;
    background-color: transparent;
}

.img-detail {
    z-index: 88;
    height: 100vh;
    width: 100%;
    position: fixed;
    display: grid;
    grid-template-rows: max-content 1fr;
    background: rgba(0, 0, 0, 0.8);
}

.img-detail-content {
    max-width: 988px;
    margin: auto;
    width: 100%;
}

.img-detail-content>img {
    aspect-ratio: 100 / 60;
    object-fit: cover;
    border-radius: 8px;
}

.prev-button {
    top: 50%;
    transform: translateY(-50%);
    left: 15px;
    border: none;
    font-size: clamp(0.8rem, 0.5rem + 3vw, 1.5rem);
    padding: 0.5em 0.8em;
    border-radius: 50%;
    position: absolute;
}

.next-button {
    top: 50%;
    font-size: clamp(0.8rem, 0.5rem + 3vw, 1.5rem);
    padding: 0.5em 0.8em;
    border-radius: 50%;
    border: none;
    transform: translateY(-50%);
    right: 15px;
    position: absolute;
}

@media only screen and (max-width: 992px) {
    .prev-button {
        left: 0px;
    }

    .next-button {
        right: 0px;
    }
}
</style>