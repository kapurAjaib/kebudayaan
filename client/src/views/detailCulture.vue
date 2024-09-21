<script setup lang="ts">
import { ref } from 'vue';
import { navMainStore } from '@/stores/navMain';
import type { ComponentExposed } from 'vue-component-type-helpers';
import type ImgDetail from '@/components/ImgDetail.vue';

const loadImage = (imgName: string) => {
    return new URL(`/src/assets/image/home/${imgName}`, import.meta.url).toString();
};
const dataImage = ref([
    loadImage('grid-img1.jpg'),
    loadImage('grid-img2.jpg'),
    loadImage('grid-img4.jpg'),
    loadImage('grid-img1.jpg'),
    loadImage('grid-img2.jpg'),
    loadImage('grid-img4.jpg'),
]);
const imgDetail = ref<ComponentExposed<typeof ImgDetail>>();
const nav = navMainStore();
const carouselResponsiveOptions = ref([
    {
        breakpoint: '767px',
        numVisible: 2,
        numScroll: 1
    },
    {
        breakpoint: '500px',
        numVisible: 1,
        numScroll: 1
    }
]);
const imageClick = (index: number) => {
    imgDetail.value?.setIndex(index);
    imgDetail.value?.toggleActive(true);
};

</script>
<template>
    <ImgDetail :img="dataImage" ref="imgDetail" />
    <section class="hero xl:h-screen flex align-items-center" :style="{ '--padding-top': `${nav.height}px` }">
        <div class="container-full ">
            <div class="grid-hero">
                <div class="flex align-items-end h-full pb-6 sm:pb-8">
                    <div>
                        <h1 class="text-white font-semibold mb-0 hero-text-title">Tari Rejang Renteng</h1>
                        <div class="text-xl text-white font-medium">Oleh I XXX</div>
                        <div class="flex text-blue mt-4 gap-4">
                            <div class="flex gap-2 align-items-center">
                                <i class="bi bi-share-fill text-xl"></i>
                                <div class="hidden sm:block">Bagikan</div>
                            </div>
                            <div class="flex gap-2 align-items-center">
                                <i class="bi bi-bookmark-fill text-xl"></i>
                                <div class="hidden sm:block">Tambahkan ke bookmark</div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="relative">
                    <img src="@/assets/image/home/grid-img1.jpg" class="w-full grid-hero-img px-1" alt="hero image" />
                    <div class="darken-gradient"></div>
                </div>
            </div>
        </div>
    </section>
    <div class="container-full mt-6">
        <div class="grid">
            <div class="lg:col-8 col-12">
                <section class="carousel-culture">
                    <PrimeCarousel :value="dataImage" :numScroll="1" :numVisible="2" :pt="{
                        pcPrevButton: {
                            root: {
                                class: 'carousel-culture-prev-btn'
                            }
                        },
                        pcNextButton: {
                            root: {
                                class: 'carousel-culture-next-btn'
                            }
                        }
                    }" :showIndicators="false" :responsiveOptions="carouselResponsiveOptions">
                        <template #previcon>
                            <svg xmlns="http://www.w3.org/2000/svg" height="18px" viewBox="0 -960 960 960" width="18px"
                                fill="black">
                                <path d="M640-80 240-480l400-400 71 71-329 329 329 329-71 71Z" />
                            </svg>
                        </template>
                        <template #item="props">
                            <div class="px-2" @click="imageClick(props.index)">
                                <img :src="props.data" class="w-full bright border-round-md" alt="carousel image" />
                            </div>
                        </template>
                        <template #nexticon>
                            <svg xmlns="http://www.w3.org/2000/svg" height="18px" viewBox="0 -960 960 960" width="18px"
                                fill="black">
                                <path d="m321-80-71-71 329-329-329-329 71-71 400 400L321-80Z" />
                            </svg>
                        </template>

                    </PrimeCarousel>
                </section>
                <section class="about-culture">
                    <h1 class="main-title font-semibold mt-6 mb-3">Tentang Kebudayaan</h1>
                    <div class="about-culture-content line-height-3 max-line-5">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's
                        standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                        scrambled it to make
                        a type specimen book. It has survived not only five centuries, but also the leap into electronic
                        typesetting,
                        remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                        sheets containing
                        Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker
                        including versions
                        of Lorem Ipsum.
                        Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker
                        including versions
                        of Lorem Ipsum.
                    </div>
                </section>
                <section class="information">
                    <h1 class="main-title font-semibold mt-6 mb-1">Informasi Tulisan</h1>
                    <div class="about-culture-content line-height-3">
                        <div class="grid-information ">
                            <div class="flex gap-3">
                                <i class="bi bi-geo-alt text-xl"></i>
                                <div>
                                    <div class="font-semibold">Asal budaya</div>
                                    <div>Jawa Timur</div>
                                </div>
                            </div>
                            <div class="flex gap-3 mt-4">
                                <i class="bi bi-pen text-xl"></i>
                                <div>
                                    <div class="font-semibold">Penulis</div>
                                    <div>sdhjksdbkds jsdbkjasd kjasbkjsad jksdkjabsd hasvkjsad jaddkjsdbb</div>
                                </div>
                            </div>
                            <div class="flex gap-3 mt-4">
                                <i class="bi bi-calendar text-xl"></i>
                                <div>
                                    <div class="font-semibold">Tanggal dibuat</div>
                                    <div>20/20/2020</div>
                                </div>
                            </div>
                            <div class="flex gap-3 mt-4">
                                <i class="bi bi-eye text-xl"></i>
                                <div>
                                    <div class="font-semibold">Dilihat</div>
                                    <div>10 orang</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="category">
                    <h1 class="main-title font-semibold mt-6 mb-3">Kategori Kebudayaan</h1>
                    <div class="flex gap-3">
                        <div class="category-item">
                            Tarian
                        </div>
                        <div class="category-item">
                            Sakral
                        </div>
                        <div class="category-item">
                            Upacara
                        </div>
                    </div>
                </section>
                <section class="comment">
                    <h1 class="main-title font-semibold mt-6 mb-3">Komentar</h1>
                    <div>
                        <div class="flex gap-3 ">
                            <div class="comment-profile-pic">
                                <img src="@/assets/image/home/grid-img1.jpg" width="32" height="32" />
                            </div>
                            <div class="w-full">
                                <div class="w-full">
                                    <textarea class="w-full px-3  py-2 border-round-lg comment-input" rows="3"
                                        placeholder="Tambahkan komentar"></textarea>
                                </div>
                                <div class="mt-1">
                                    <button class="comment-send-btn">Kirim</button>
                                </div>
                            </div>

                        </div>
                    </div>

                    <CommentMain />
                    <div class="text-center">
                        <button class="see-all-comment-btn">Lihat komentar Lainnya</button>
                    </div>
                </section>
                <section class="mt-4">
                    <div class="font-medium flex gap-3 align-items-center">
                        <i class="bi bi-flag text-lg"></i>
                        <div>Laporkan Tulisan</div>
                    </div>
                </section>
            </div>
            <div class="lg:col-4 col-12 lg:pl-6">
                <section class="related-culture">
                    <h1 class="main-title font-semibold mb-3">Tulisan serupa</h1>
                    <div class="grid">
                        <div class="flex gap-2 lg:col-12 sm:col-6 col-12 related-culture-item">
                            <div>
                                <img src="@/assets/image/home/grid-img1.jpg" width="80" alt="hero image"
                                    class="border-round-md" />

                            </div>
                            <div>
                                <div class="text-lg font-medium"> Tarian Kecak</div>
                                <div>I Made shjkdskjsd </div>
                            </div>
                        </div>
                        <div class="flex gap-2 lg:col-12 sm:col-6 col-12 related-culture-item">
                            <div>
                                <img src="@/assets/image/home/grid-img1.jpg" width="80" alt="hero image"
                                    class="border-round-md" />

                            </div>
                            <div>
                                <div class="text-lg font-medium"> Tarian Kecak</div>
                                <div>I Made shjkdskjsd </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

</template>

<style scoped>
.comment-list {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.main-title {
    font-size: clamp(1.25rem, 0.5rem + 3vw, 1.6rem);
}

.border-abc {
    display: none !important;
    background-color: red;
}

.hero-text-title {
    font-size: clamp(1.6rem, 3vw + 0.5rem, 3rem);
}


.text-blue {
    color: #00A3FF;
}

.darken-gradient {
    width: 100%;
    top: 0;
    left: 0;
    pointer-events: none;
    position: absolute;
    height: 100%;
    background: linear-gradient(to right, rgb(32, 33, 36), rgba(0, 0, 0, 0) 56%), linear-gradient(to top, rgb(32, 33, 36) 0, rgba(0, 0, 0, 0) 56%), linear-gradient(to left, rgb(32, 33, 36) 0, rgba(0, 0, 0, 0) 56%);

}

.hero {
    background-color: rgb(32, 33, 36);
    padding-top: var(--padding-top);
}

.grid-hero {
    display: grid;
    grid-template-columns: repeat(12, 1fr);
    grid-template-rows: 1fr;
}

.grid-hero>div:nth-child(1) {
    grid-column: 1/6;
    grid-row: 1;
    z-index: 2;
}

.grid-hero>div:nth-child(2) {
    grid-column: 4 / 13;
    grid-row: 1;
}

.grid-hero-img {
    aspect-ratio: 100/60;
    object-fit: cover;
}

.p-carousel-indicator-list {
    display: none
}

.carousel-culture {
    position: relative;
}

.carousel-culture :deep(.carousel-culture-next-btn) {
    /* right: calc(-20px + 0.6vw); */
    right: 0;
    transform: translate(30%);
}

.carousel-culture :deep(.carousel-culture-prev-btn) {
    left: 0px;
    transform: translate(-30%);
}

.carousel-culture :deep(.carousel-culture-prev-btn),
.carousel-culture :deep(.carousel-culture-next-btn) {
    z-index: 3 !important;
    position: absolute;
    border-radius: 50%;
    color: black;
    width: max-content;
    height: max-content;
    font-weight: 600;
    font-size: clamp(0.5rem, 0.3rem + 1vw, 1rem);
    padding: 1em 1.2em;
    box-shadow: 0px 1px 8px rgba(0, 0, 0, 0.08), 0px 3px 4px rgba(0, 0, 0, 0.1), 0px 1px 4px -1px rgba(0, 0, 0, 0.1);
    background-color: white;
    font-family: inherit;

}

.carousel-culture :deep(.p-disabled) {
    display: none;
}

.grid-information {
    border: 1px solid rgb(193, 194, 194);
    border-radius: 16px;
    padding: 20px 30px;
}

.category-item {
    border: none;
    border-radius: 16px;
    font-weight: 500;
    background-color: hsl(0, 0%, 91%);
    padding: 8px 15PX;
}

.max-line-5 {
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 5;
    line-clamp: 5;
    -webkit-box-orient: vertical;
}

.comment-send-btn {
    border: 0;
    font-weight: 600;
    background-color: #00A3FF;
    color: white;
    padding: 7px 20px;
    border-radius: 8px;
    transition: background-color 500ms;
}

.comment-send-btn:hover {
    background-color: #0f419e;
}

.see-all-comment-btn {
    padding: 8px 15px;
    border: none;
    border-radius: 8px;
    background-color: transparent;
    color: #00A3FF;
    font-weight: 600;
}

.related-culture-item:hover {
    border-radius: 8px;
    background-color: rgb(246, 246, 246);
}

.comment-profile-pic>img {
    border-radius: 50%;
    object-fit: cover;
}

@media (max-width: 992px) {
    .grid-hero>div:nth-child(1) {
        grid-column: 1/-1;
        grid-row: 1;
        z-index: 2;
    }

    .grid-hero>div:nth-child(2) {
        grid-column: 1 / -1;
        grid-row: 1;
    }
}



@media screen and (max-width: 576px) {
    .grid-hero>div:nth-child(1) {
        grid-column: 1/-1;
        grid-row: 2;
        z-index: 2;
    }

    .grid-hero>div:nth-child(2) {
        grid-column: 1 / -1;
        grid-row: 1;
    }

    .grid-hero-img {
        aspect-ratio: 100/55;
    }

    .carousel-culture :deep(.carousel-culture-next-btn) {
        transform: translate(15%);
    }

    .carousel-culture :deep(.carousel-culture-prev-btn) {
        transform: translate(-15%);
    }
}
</style>