<script lang="ts" setup>
import { onMounted, onUnmounted, ref } from 'vue';
import { navMainStore } from '@/stores/navMain';

const navMain = navMainStore();


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
        <div class="sm:h-screen">
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

    <section class="gallery container mt-8">
        <div class="gallery-grid">
            <div class="img-zoom-on-hover shadow-2">
                <img src="@/assets//image/home/grid-img1.jpg" class="gallery-img " alt="Grid image kecak" />
            </div>
            <div class="img-zoom-on-hover shadow-2">
                <img src="@/assets//image/home/grid-img2.jpg" class="gallery-img" alt="Grid image people" />
            </div>
            <div class="img-zoom-on-hover hidden sm:block shadow-2">
                <img src="@/assets//image/home/grid-img3.jpg" class="gallery-img" alt="Grid image statue" />
            </div>
            <div class="img-zoom-on-hover shadow-2">
                <img src="@/assets//image/home/grid-img4.jpg" class="gallery-img" alt="Grid image tradition" />
            </div>
            <div class="img-zoom-on-hover shadow-2">
                <img src="@/assets//image/home/grid-img5.jpg" class="gallery-img" alt="Grid image people" />
            </div>
        </div>
    </section>

    <section class="about container mt-6">
        <h1 class="text-2xl mb-2">Explore budaya</h1>
        <div class="grid">
            <div class="sm:col-6 col-12 pr-0">
                <div>
                    <p>
                        Explore Budaya adalah wadah bagi kebudayaan-kebudayaan yang ada hampir di seluruh
                        wilayah
                        atau
                        Pulau
                        yang ada di Indonesia mulai dari sabang sampai merauke.
                    </p>
                    <p class="mb-0">Explore Budaya mencakup hampir seluruh wilayah yang ada di Indonesia.
                        Seperti
                        Provinsi :</p>
                </div>
                <TypeWriter :data="['Kalimantan selatan', 'Bali', 'Jawa Timur']" v-slot="data">
                    <div class="about-typewriter text-2xl font-semibold uppercase">
                        {{ data.text }}
                    </div>
                </TypeWriter>
            </div>
            <div class="sm:col-6 col-12 px-4 flex align-items-center justify-content-center">
                <div>
                    <img src="@/assets/image/home/map.png" class="w-full" alt="Map" />
                </div>
            </div>


        </div>
    </section>

    <section class="culture-list mt-6">
        <div class="container py-4">
            <h1 class="text-2xl mb-2">Kebudayaan</h1>
            <div class="grid">
                <div class="col-12 sm:col-6 md:col-4">
                    <div class="culture-list-item py-4 px-3">
                        <div>
                            <img src="@/assets//image/home/home1.jpg" class="w-full" />
                        </div>
                        <div>
                            <h2 class="text-xl mb-0 mt-2">Nama</h2>
                            <div class="max-line-3">sdhsdlkhsdlk khdgsjhvabd ashdvjhasv dbskasdaskvasd vasvjhavsjhsad
                                jasdvjhasdv adjva shhddddj dshjk bdsjshksd sjsdkj hsdkjsd hshdssd sbsd
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 sm:col-6 md:col-4">
                    <div class="culture-list-item py-4 px-3">
                        <div>
                            <img src="@/assets//image/home/home1.jpg" class="w-full" />
                        </div>
                        <div>
                            <h2 class="text-xl mb-0 mt-2">Nama</h2>
                            <div class="max-line-3">sdhsdlkhsdlk khdgsjhvabd ashdvjhasv dbskasdaskvasd vasvjhavsjhsad
                                jasdvjhasdv adjva shhddddj dshjk bdsjshksd sjsdkj hsdkjsd hshdssd sbsd
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 sm:col-6 md:col-4">
                    <div class="culture-list-item py-4 px-3">
                        <div>
                            <img src="@/assets//image/home/home1.jpg" class="w-full" />
                        </div>
                        <div>
                            <h2 class="text-xl mb-0 mt-2">Nama</h2>
                            <div class="max-line-3">sdhsdlkhsdlk khdgsjhvabd ashdvjhasv dbskasdaskvasd vasvjhavsjhsad
                                jasdvjhasdv adjva shhddddj dshjk bdsjshksd sjsdkj hsdkjsd hshdssd sbsd
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 sm:col-6 md:col-4">
                    <div class="culture-list-item py-4 px-3">
                        <div>
                            <img src="@/assets//image/home/home1.jpg" class="w-full" />
                        </div>
                        <div>
                            <h2 class="text-xl mb-0 mt-2">Nama</h2>
                            <div class="max-line-3">sdhsdlkhsdlk khdgsjhvabd ashdvjhasv dbskasdaskvasd vasvjhavsjhsad
                                jasdvjhasdv adjva shhddddj dshjk bdsjshksd sjsdkj hsdkjsd hshdssd sbsd
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 sm:col-6 md:col-4">
                    <div class="culture-list-item py-4 px-3">
                        <div>
                            <img src="@/assets//image/home/home1.jpg" class="w-full" />
                        </div>
                        <div>
                            <h2 class="text-xl mb-0 mt-2">Nama</h2>
                            <div class="max-line-3">sdhsdlkhsdlk khdgsjhvabd ashdvjhasv dbskasdaskvasd vasvjhavsjhsad
                                jasdvjhasdv adjva shhddddj dshjk bdsjshksd sjsdkj hsdkjsd hshdssd sbsd
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 sm:col-6 md:col-4">
                    <div class="culture-list-item py-4 px-3">
                        <div>
                            <img src="@/assets//image/home/home1.jpg" class="w-full" />
                        </div>
                        <div>
                            <h2 class="text-xl mb-0 mt-2">Nama</h2>
                            <div class="max-line-3">sdhsdlkhsdlk khdgsjhvabd ashdvjhasv dbskasdaskvasd vasvjhavsjhsad
                                jasdvjhasdv adjva shhddddj dshjk bdsjshksd sjsdkj hsdkjsd hshdssd sbsd
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-content-center mt-4">
                <button class="btn-see-another">
                    Lihat Lainnya
                </button>
            </div>
        </div>
    </section>
</template>
<style scoped>
.bg-white {
    background-color: white;
}

.hero-title {
    text-transform: uppercase;
    color: white;
    font-weight: 600;
    font-size: clamp(1rem, 2vw + 0.5rem, 1.5rem);
}

.hero>div {
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
    filter: brightness(90%);
}

.gallery-img {
    object-fit: cover;

    width: 100%;
    border-radius: 4px;
    height: 100%;
}


.about-typewriter {
    overflow: hidden;
    white-space: nowrap;
    will-change: width;
    color: #00A3FF;
}

.culture-list {
    background: url('@/assets/image/home/bg.png');
}

.culture-list-item {
    transition: all 600ms;
    border-radius: 4px;
}

.culture-list-item img {
    border-radius: 8px;
}

.culture-list-item:hover {
    background-color: rgb(255, 255, 255);
    box-shadow: 0px 1px 8px rgba(0, 0, 0, 0.08), 0px 3px 4px rgba(0, 0, 0, 0.1), 0px 1px 4px -1px rgba(0, 0, 0, 0.1);
}

.btn-see-another {
    border: 0;
    font-weight: 600;
    background-color: #00A3FF;
    color: white;
    padding: 10px 30px;
    border-radius: 8px;
    transition: background-color 500ms;
}

.btn-see-another:hover {
    background-color: #0f419e;
}

@media screen and (max-width: 576px) {


    .gallery-grid {
        grid-template-columns: repeat(12, 1fr);
        grid-template-areas:
            "img1 img1 img1 img1 img1 img1 img2 img2 img2 img2 img2 img2"
            "img4 img4  img4  img4 img4 img4 img5 img5 img5 img5 img5 img5";
    }
}
</style>