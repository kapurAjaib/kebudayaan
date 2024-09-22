<script lang="ts" setup>
import { onMounted, onUnmounted, ref, shallowRef } from 'vue';
import { navMainStore } from '@/stores/navMain';
const navState = navMainStore();
let id = 0;
const files = shallowRef<File[]>([]);
const fileInput = ref<HTMLInputElement>();
const filecb = () => {
    const file = fileInput.value?.files?.[0] as File;
    files.value = [file];
}
const selectFile = () => {
    console.log('sjdjsd');
    //@ts-ignore
    fileInput.value?.click();


}
onMounted(() => {
    fileInput.value?.addEventListener('change', filecb);
});
onUnmounted(() => {
    fileInput.value?.removeEventListener('change', filecb);
});
const mapId = function <T>(array: T[]) {
    return array.map((e) => ({
        value: e,
        id: id++
    }));
};

const toBlobURL = (file: File) => {
    console.log(file);
    return URL.createObjectURL(file);
}
</script>
<template>
    <section class="hero py-8" :style="{ 'padding-top': `${navState.height}px` }">
        <div class="container text-center text-white ">
            <h1 class="text-4xl">Tambahkan Acara</h1>
            <div class="text-hero">
                Ikut berkontribusi dalam pelestarian budaya dengan membagikan acara-acara yang akan datang mengenai
                Kebudayaan Indonesia!
            </div>
        </div>
    </section>
    <section>
        <div class="container py-4">
            <div>
                <div class="input-group">
                    <div class="font-semibold">Nama Acara</div>
                    <input class="input-culture" placeholder="Masukan nama acara disini" />
                </div>

                <div class="input-group mt-5">
                    <div class="font-semibold">Lokasi Acara</div>
                    <input class="input-culture" placeholder="Masukan Lokasi acara" />
                </div>
                <div class="input-group mt-5">
                    <div class="font-semibold">Harga tiket</div>
                    <input class="input-culture" placeholder="Masukan Lokasi acara" />
                </div>
                <div class="mt-5">
                    <div class="font-semibold">Jadwal Acara</div>
                    <div class="grid">
                        <div class="input-group md:col-5 col-12">
                            <PrimeDatePicker showIcon fluid iconDisplay="input" placeholder="Tanggal" />
                            <PrimeDatePicker showIcon fluid iconDisplay="input" timeOnly class="mt-4" placeholder="Jam">
                                <template #inputicon="slotProps">
                                    <i class="bi bi-clock pb-2" @click="slotProps.clickCallback"></i>
                                </template>
                            </PrimeDatePicker>
                        </div>
                        <div class="input-group md:col-2 col-12 flex justify-content-center align-items-center">Sampai
                            dengan
                        </div>
                        <div class="input-group md:col-5 col-12">
                            <PrimeDatePicker showIcon fluid iconDisplay="input" placeholder="Tanggal" />
                            <PrimeDatePicker showIcon fluid iconDisplay="input" timeOnly placeholder="Jam" class="mt-4">
                                <template #inputicon="slotProps">
                                    <i class="bi bi-clock pb-2" @click="slotProps.clickCallback"></i>
                                </template>
                            </PrimeDatePicker>

                        </div>
                    </div>


                </div>
                <div class="input-group mt-5">
                    <div class="font-semibold">Cara pembelian tiket</div>
                    <input class="input-culture" placeholder="Deskripsikan cara membeli tiket" />
                </div>
                <div class="input-group mt-5">
                    <div class="font-semibold">Kategori Acara</div>
                    <input class="input-culture" placeholder="Tekan Enter untuk menambah acara" />
                </div>
                <div class="input-group mt-5">
                    <div class="font-semibold">Deskripsi Acara</div>
                    <textarea class="input-culture" placeholder="Deskripsikan Acara" rows="4"></textarea>
                </div>
                <div class="input-group mt-5">
                    <div class="font-semibold">Dokumentasi budaya</div>
                    <div class="input-culture-file" placeholder="Deskripsikan budaya" rows="4">
                        <div>
                            <input type="file" class="hidden" ref="fileInput" />
                            <button class="button-add-file" @click="selectFile">
                                <i class="bi bi-plus"></i>
                                Pilih File
                            </button>
                        </div>
                        <div class="mt-4  px-2">
                            <div class="grid">
                                <div v-for="img in mapId(files)" :key="img.id"
                                    class="col-3 grid flex  align-items-center relative">
                                    <div class="input-file-cancel">
                                        <i class="bi bi-x-lg text-xl"></i>
                                    </div>
                                    <img :src="toBlobURL(img.value)" class="w-full border-round-md" />
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <button class="submit-btn">Kirim</button>
                </div>
            </div>
        </div>
    </section>
</template>
<style scoped>
.profile-pic {
    width: 100%;
    border-radius: 50%;
    aspect-ratio: 1/1;

    background-color: black;
}

.text-hero {
    max-width: 500px;
    color: white;
    margin: auto;
}

.hero {
    background: url('@/assets/image/hero.png');
    background-repeat: no-repeat;
    background-size: cover;
}

.input-culture {
    width: 100%;
    padding: 13px 15px;
    border: none;
    border-radius: 8px;
    background-color: #F2F2F2;
}

.container-form {
    max-width: 600px;
}

.submit-btn {
    background-color: #00A3FF;
    color: white;
    border: none;
    border-radius: 8px;
    padding: 9px 30px;
}

.input-culture-file {
    border: 1px solid #E2E8F0;
    padding: 20px 15px;
    border-radius: 8px;
}

.button-add-file {
    background-color: #00A3FF;
    color: white;
    border: none;
    font-size: 1rem;
    border-radius: 8px;
    padding: 8px 10px;
}

.input-file-cancel {
    top: 0;
    right: 5px;
    padding: 10px;
    color: white;
    position: absolute;
}
</style>