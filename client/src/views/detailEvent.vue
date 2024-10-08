<script setup lang="ts">
import { ref } from 'vue';
import { navMainStore } from '@/stores/navMain';
import { eventStore } from '@/stores/eventStore';
import { useRoute, useRouter } from 'vue-router';
import { useToast } from 'primevue/usetoast';
import { google } from 'calendar-link';
import { eventConstant, eventStatus } from '@/data/event';

const route = useRoute();
const router = useRouter();
const eventData = eventStore();
const toast = useToast();
const event = eventData.getDataById(parseInt(route.params.id as string));
if (!event) {
    router.replace('/notfound');
}
const isLoading = ref(false);
const relatedEvent = eventData.data.slice(0, 2);
const nav = navMainStore();
nav.active = 'event';
const isReportDialogVisible = ref(false);
const showReportDialog = () => {
    isReportDialogVisible.value = true;
};
const hideReportDialog = () => {
    isReportDialogVisible.value = false;
}
const formatDate = (date: Date) => {
    return new Intl.DateTimeFormat('id').format(date);
}
const formatTime = (date: Date) => {
    const userTimezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
    return date.toLocaleTimeString('id', { hour: '2-digit', minute: '2-digit', timeZone: userTimezone });
}
const formatNumber = (number: number) => {
    return number.toLocaleString('id-ID').replace(',', '.');
};
const seeMoreClick = () => {
    isLoading.value = true;
    setTimeout(() => {
        isLoading.value = false;
        limit.value = limit.value + perPage;
    }, 2000);
}
const perPage = 3;
const limit = ref(perPage);
const inputComment = defineModel<string>('inputComment');
const addComment = () => {
    if (!inputComment.value) {
        return;
    }
    toast.add({
        severity: 'success',
        summary: 'Sukses',
        detail: 'Sukses menambahkan komentar', life: 3000
    });
    eventData.addComment(event?.id as number, inputComment.value);
    inputComment.value = '';

}
const reportSend = () => {
    toast.add({
        severity: 'success',
        summary: 'Sukses',
        detail: 'Sukses melaporkan acara'
    });
    hideReportDialog();
}
const shareDialogVisibility = ref(false);
const showShareDialog = () => {
    shareDialogVisibility.value = true;
}
const getCurrentUrl = () => {
    return new URL(route.fullPath, import.meta.url).href;
}
const openCalendar = () => {
    const url = google({
        title: event?.name as string,
        start: event?.startDate,
        end: event?.endDate,
        location: event?.location,
        description: event?.description.replace(/\s\s+/g, ' ')
    });

    window.open(url);
}
</script>
<template>
    <PrimeToast />
    <section class="hero lg:h-screen flex align-items-center text-white "
        :style="{ '--padding-top': `${nav.height}px`, '--background-image': `url(${event?.image})` }">
        <div class="container-full flex justify-content-center flex-column align-items-center py-8">
            <div class=" hero-text-title font-medium">{{ event?.name }}</div>
            <div class="mt-2 text-2xl font-medium">{{ eventStatus[event?.status as number] }}</div>
            <div class="flex text-blue mt-4 gap-4">
                <ShareDialog :url="getCurrentUrl()" v-model:visibility="shareDialogVisibility" />
                <button class="btn-transparent flex gap-2 align-items-center" @click="showShareDialog">
                    <i class="bi bi-share-fill text-xl"></i>
                    <div>Bagikan</div>
                </button>
                <button class="btn-transparent flex gap-2 align-items-center" @click="openCalendar"
                    v-if="event?.status !== eventConstant.status.ended">
                    <i class="bi bi-calendar text-xl"></i>
                    <div>Tambahkan ke kalender</div>
                </button>
            </div>
        </div>
    </section>
    <div class="container-full mt-6">
        <div class="grid">
            <div class="lg:col-8 col-12">
                <section class="about">
                    <h1 class="main-title font-semibold mt-6 mb-3">Tentang Acara</h1>
                    <div class="line-height-3">
                        {{ event?.description }}
                    </div>
                </section>
                <section class="information">
                    <h1 class="main-title font-semibold mt-6 mb-1">Informasi Acara</h1>
                    <div class="line-height-3">
                        <div class="grid-information ">
                            <div class="flex gap-3">
                                <i class="bi bi-geo-alt text-xl"></i>
                                <div>
                                    <div class="font-semibold">Lokasi acara</div>
                                    <div>{{ event?.location }}</div>
                                </div>
                            </div>
                            <div class="flex gap-3 mt-4">
                                <i class="bi bi-pen text-xl"></i>
                                <div>
                                    <div class="font-semibold">Penyelenggara</div>
                                    <div>{{ event?.organizer }}</div>
                                </div>
                            </div>
                            <div class="flex gap-3 mt-4">
                                <i class="bi bi-calendar text-xl"></i>
                                <div>
                                    <div class="font-semibold">Jadwal Acara</div>
                                    <div>
                                        {{ formatDate(event?.startDate as Date) }}
                                        ({{ formatTime(event?.startDate as Date) }})
                                        -
                                        {{ formatDate(event?.endDate as Date) }}
                                        ({{ formatTime(event?.endDate as Date) }})
                                    </div>
                                </div>
                            </div>
                            <div class="flex gap-3 mt-4">
                                <i class="bi bi-ticket-perforated text-xl"></i>
                                <div>
                                    <div class="font-semibold">Harga Tiket</div>
                                    <div>{{ event?.price ? formatNumber(event.price) : 'Gratis' }}</div>
                                </div>
                            </div>
                            <div class="flex gap-3 mt-4" v-if="event?.buyMethod">
                                <i class="bi bi-patch-question text-xl"></i>
                                <div>
                                    <div class="font-semibold">Cara membeli</div>
                                    <div>{{ event?.buyMethod }}</div>
                                </div>
                            </div>
                            <div class="flex gap-3 mt-4">
                                <i class="bi bi-eye text-xl"></i>
                                <div>
                                    <div class="font-semibold">Dilihat</div>
                                    <div>{{ event?.view }} orang</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="category">
                    <h1 class="main-title font-semibold mt-6 mb-3">Kategori Acara</h1>
                    <div class="flex gap-3">
                        <div class="category-item">
                            Kesenian
                        </div>
                        <div class="category-item">
                            Acara tahunan
                        </div>
                        <div class="category-item">
                            Pesta kesenian
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
                                        placeholder="Tambahkan komentar" v-model="inputComment"></textarea>
                                </div>
                                <div class="mt-1">
                                    <button class="comment-send-btn" @click="addComment">Kirim</button>
                                </div>
                            </div>

                        </div>
                    </div>

                    <CommentMain :limit="limit" :comments="event?.comment" />
                    <div class="flex justify-content-center">
                        <LoadingSpinner v-if="isLoading" />
                    </div>
                    <div class="text-center" v-if="!isLoading && (limit < (event?.comment.length ?? 0))">
                        <button class="see-all-comment-btn" @click="seeMoreClick">Lihat {{
                            Math.max((event?.comment.length ??
                                0) - limit, 0)
                        }} komentar Lainnya</button>
                    </div>
                </section>
                <section class="mt-4 mb-5">
                    <PrimeDialog v-model:visible="isReportDialogVisible" :draggable="false" modal
                        :style="{ 'max-width': '400px', 'width': 'calc(100% - 10px)' }">
                        <template #header>
                            <div class="inline-flex items-center justify-center gap-2">
                                <span class="font-bold whitespace-nowrap">Laporkan tulisan</span>
                            </div>
                        </template>
                        <div>
                            <textarea class="w-full input-report" placeholder="Berikan alasanmu" rows="4"></textarea>

                        </div>
                        <div class="mt-2">
                            <button class="report-send-btn" @click="reportSend">Kirim</button>
                            <button class="report-cancel-btn ml-3" @click="hideReportDialog">Batal</button>
                        </div>
                    </PrimeDialog>
                    <div class="font-medium flex gap-3 align-items-center" @click="showReportDialog">
                        <i class="bi bi-flag text-lg"></i>
                        <div>Laporkan acara</div>
                    </div>
                </section>
            </div>
            <div class="lg:col-4 col-12 lg:pl-6">
                <section class="related-culture">
                    <h1 class="main-title font-semibold mb-3">Acara serupa</h1>
                    <div class="grid">
                        <div class=" lg:col-12 sm:col-6 col-12 related-culture-item" v-for="data in relatedEvent"
                            :key="data.id">
                            <RouterLink :to="`/event/${data.id}`" class="flex gap-2">
                                <div>
                                    <img :src="data.image" width="80" :alt="`image ${data.name}`"
                                        class="border-round-md img-event" />
                                </div>
                                <div>
                                    <div class="text-lg font-medium"> {{ data.name }}</div>
                                    <div>{{ data.price ? formatNumber(data.price) : 'Gratis' }}</div>
                                </div>
                            </RouterLink>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

</template>

<style scoped>
.hero {
    background: linear-gradient(rgba(0, 0, 0, 0.7),
            rgba(0, 0, 0, 0.7)), var(--background-image);
    background-repeat: no-repeat;
    background-size: cover;
}

.hero-timer-grid {
    display: grid;
    gap: 26px;
    grid-template-columns: repeat(4, 1fr);
}

.hero-text-timer {
    line-height: 1;
    color: #00A3FF;
    font-size: 4rem;
}

.comment-list {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.main-title {
    font-size: clamp(0.9rem, 0.5rem + 3vw, 1.2rem);
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

.report-send-btn {
    border: 0;
    font-weight: 600;
    background-color: #00A3FF;
    color: white;
    padding: 7px 20px;
    border-radius: 8px;
    transition: background-color 500ms;
}

.report-send-btn:hover {
    background-color: #0f419e;
}

.report-cancel-btn {
    border: 0;
    font-weight: 600;
    color: white;
    padding: 7px 20px;
    border-radius: 8px;
    background-color: rgb(228, 16, 16);
    transition: background-color 500ms;
}

.input-report {
    padding: 10px;
    border: solid 1px rgb(193, 194, 194);
    border-radius: 8px;
    outline: none;
}

.img-event {
    aspect-ratio: 3/2;
}

.comment-input {
    border: solid 1px;
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