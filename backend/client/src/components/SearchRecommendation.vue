<script lang="ts" setup>
import { ref } from 'vue';
const regionsName = ref([
    'aceh',
    'bali',
    'sumatra',
    'jawa',
    'lombok',
    'NTT',
    'NTB',
    'Papua'
]);</script>
<template>
    <div class="search-recommendation">
        <div class="flex flex-column">
            <h1 class="recommendation-title">Budaya</h1>
            <div class="grid ">
                <div class="col-12 sm:col-4 md:col-3 up-on-hover">
                    <div class="shadow-4 border-round-md p-3">
                        <div class="recommendation-text ">Tarian</div>
                        <div>
                            <img src="@/assets/image/register.png" class="aspect-ratio-1-1 w-full" />
                        </div>
                    </div>
                </div>
                <div class="col-12 sm:col-4 md:col-3 up-on-hover">
                    <div class="shadow-4 border-round-md p-3">
                        <div class="recommendation-text">Karya sastra</div>
                        <div>
                            <img src="@/assets/image/register.png" class="aspect-ratio-1-1 w-full" />
                        </div>
                    </div>
                </div>
                <div class="col-6 sm:col-4 md:col-3 up-on-hover">
                    <div class="shadow-4 border-round-md p-3">
                        <div class="recommendation-text">Gamelan</div>
                        <div>
                            <img src="@/assets/image/register.png" class="aspect-ratio-1-1 w-full" />
                        </div>
                    </div>
                </div>
                <div class="col-6 sm:col-4 md:col-3 up-on-hover">
                    <div class="shadow-4 border-round-md p-3">
                        <div class="recommendation-text">Seni rupa</div>
                        <div>
                            <img src="@/assets/image/register.png" class="aspect-ratio-1-1 w-full" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-column mt-3">
            <h1 class="recommendation-title">Acara</h1>
            <div class="grid justify-content-strech">
                <div class="col-12 sm:col-4 md:col-3  up-on-hover">
                    <div class="shadow-4 border-round-md p-3">
                        <div class="recommendation-text">Tarian</div>
                        <div>
                            <img src="@/assets/image/register.png" class="aspect-ratio-1-1 w-full" />
                        </div>
                    </div>
                </div>
                <div class=" col-12 sm:col-4 md:col-3 up-on-hover">
                    <div class="shadow-4 border-round-md p-3">
                        <div class="recommendation-text">Karya sastra</div>
                        <div>
                            <img src="@/assets/image/register.png" class="aspect-ratio-1-1 w-full" />
                        </div>
                    </div>
                </div>
                <div class="col-6 sm:col-4 md:col-3 up-on-hover">
                    <div class="shadow-4 border-round-md p-3">
                        <div class="recommendation-text">Gamelan</div>
                        <div>
                            <img src="@/assets/image/register.png" class="aspect-ratio-1-1 w-full" />
                        </div>
                    </div>
                </div>
                <div class="col-6 sm:col-4 md:col-3 up-on-hover">
                    <div class="shadow-4 border-round-md p-3">
                        <div class="recommendation-text">Seni rupa</div>
                        <div>
                            <img src="@/assets/image/register.png" class="aspect-ratio-1-1 w-full" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-column mt-3">
            <h1 class="recommendation-title">Daerah</h1>
            <div class="flex gap-3 flex-wrap">
                <div class="chip" v-for="region in regionsName" :key="region">
                    {{ region }}
                </div>
            </div>
        </div>
    </div>
</template>
<style scoped>
.recommendation-title {
    font-size: 1rem;
    margin-bottom: 10px;
    font-weight: 500;
    color: #777171;
}

.recommendation-text {
    font-weight: 600;
    font-size: 1.1rem;
}

.aspect-ratio-1-1 {
    aspect-ratio: 4/2;
    object-fit: cover;
    border-radius: 4px;
    margin-top: 6px;
}

.chip {
    padding: 8px 15PX;
    border-radius: 8px;
    font-weight: 500;
    background-color: hsl(0, 0%, 91%);
    text-transform: capitalize;
}
</style>