<script lang="ts" setup>
import { onMounted, onUnmounted, onUpdated, ref } from 'vue';
import { navMainStore } from '@/stores/navMain';
let count = 0;

const navMain = navMainStore();
onUpdated(() => {
    console.log(count);
    count++;
});
const navHeight = ref(0);
let abortController: AbortController;
const resize = () => {
    if (window.innerWidth <= 576) {
        navHeight.value = navMain.height;
        return;
    }
    navHeight.value = 0;
}
onMounted(() => {
    resize();
    abortController = new AbortController();
    window.addEventListener('resize', resize, {
        signal: abortController.signal
    });
});
onUnmounted(() => {
    abortController.abort();
});

</script>
<template>
    <section class="hero" :style="{ 'padding-top': `${navHeight}px` }">
        <div>
            <div class="text-center">
                <h1 class="hero-title m-0 p-0">Mari jelajahi budaya Kita</h1>
                <div class="brand-name">
                    Explore <span class="brand-name-dark-blue">Budaya</span>
                </div>
                <button class="action-btn mt-3">
                    <RouterLink to="/">Jelajahi sekarang</RouterLink>
                </button>
            </div>
        </div>
    </section>

    <section class="gallery container mt-3">
        <div class="gallery-grid">
            <div class="img-zoom-on-hover">
                <img src="@/assets//image/home/home1.jpg" class="gallery-img " />
            </div>
            <div class="img-zoom-on-hover">
                <img src="@/assets//image/home/home1.jpg" class="gallery-img" />
            </div>
            <div class="img-zoom-on-hover">
                <img src="@/assets//image/home/home1.jpg" class="gallery-img" />
            </div>
            <div class="img-zoom-on-hover">
                <img src="@/assets//image/home/home1.jpg" class="gallery-img" />
            </div>
            <div class="img-zoom-on-hover">
                <img src="@/assets//image/home/home1.jpg" class="gallery-img" />
            </div>
        </div>
    </section>
</template>
<style scoped>
.hero-title {
    text-transform: uppercase;
    color: white;
    font-weight: 600;
    font-size: clamp(1rem, 2vw + 0.5rem, 1.5rem);
}

.hero>div {
    height: 100vh;
    padding: 80px 20px;
    overflow: hidden;
    background: rgba(0, 0, 0, 0.8) url('@/assets/image/home/nyepi.png');
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
    background-repeat: no-repeat;
}

.brand-name {
    color: #00A3FF;
    font-weight: 600;
    text-transform: uppercase;
    font-size: clamp(2rem, 5vw + 0.8rem, 4.3rem);
}

.brand-name-dark-blue {
    color: #113CD1;
}

.action-btn {
    background-color: #1e42c5;
    padding: 1em 2em;
    font-size: clamp(0.85rem, 0.3rem + 1vw, 1rem);
    text-align: center;
    text-transform: uppercase;
    font-family: poppins, sans-serif;
    transition: 0.5s;
    background-size: 200% auto;
    border: none;
    color: white;
    margin: auto;
    border-radius: 10px;
    font-weight: 600;
    display: block;
}

.action-btn:hover {
    background-color: #4169fb;
    /* change the direction of the change here */
    color: #dfd4d4;
    text-decoration: none;
}

.gallery-grid {
    display: grid;
    gap: 10px;
    grid-template-columns: repeat(11, 1fr);
    grid-template-areas: "img1 img1 img1 img1 img2 img2 img2 img3 img3 img3 img3"
        "img4 img4  img4  img5 img5 img5 img5 img3 img3 img3 img3";
}

.gallery-grid>div:nth-child(1) {
    grid-area: img1;
}

.gallery-grid>div:nth-child(2) {
    grid-area: img2;

}

.gallery-grid>div:nth-child(3) {
    grid-area: img3;

}

.gallery-grid>div:nth-child(4) {
    grid-area: img4;

}

.gallery-grid>div:nth-child(5) {
    grid-area: img5;

}

.gallery-img {
    width: 100%;
    border-radius: 4px;
    height: 100%;
}

@media screen and (max-width: 576px) {
    .hero>div {
        height: auto;
    }
}
</style>