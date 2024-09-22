<script lang="ts" setup>
import { navMainStore } from '@/stores/navMain';
const navState = navMainStore();
</script>
<template>
    <div :style="{ 'padding-top': `${navState.height}px` }" class="min-h-screen">
        <div class="container-full text-center pt-5">
            <h1 class="mb-0 mt-0 text-3xl">Halaman tidak ditemukan </h1>
            <div>
                <span>Sepertinya kamu tersesat ingin Kembali ke</span>
                <RouterLink to="/" class="link-blue"> beranda ?</RouterLink>
            </div>
            <div class="line-height-1 mt-4 not-found-text">404</div>
        </div>
    </div>
</template>
<style scoped>
.not-found-title {
    font-size: 4rem;
}

.link-blue {
    color: #00A3FF;
    z-index: 1;
}

.not-found-text {
    color: #dadada;
    pointer-events: none;
    font-size: clamp(10rem, 20vw + 5rem, 25rem);
}
</style>