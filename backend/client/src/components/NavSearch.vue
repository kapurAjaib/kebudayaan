<script lang="ts" setup>
import { onUnmounted, ref, watch } from 'vue';
const isSearchEmpty = ref(true);
const searchModel = defineModel('searchModel');
const isActive = ref(false);
const inputChange = (evt: Event) => {
    const input = evt.target as HTMLInputElement;
    isSearchEmpty.value = !input.value
}
const toggleActive = (force?: boolean) => {
    isActive.value = force || !isActive.value;
}
const backdropClick = (evt: Event) => {
    if (evt.target === evt.currentTarget) {
        toggleActive(false);
    }
}

onUnmounted(() => {
    document.body.classList.remove('overflow-hidden');
});

watch(isActive, () => {
    document.body.classList.toggle('overflow-hidden', isActive.value);
});
defineExpose({
    toggleActive,
    searchModel
});
</script>
<template>
    <div class="search-card-wrapper" @click="backdropClick" v-if="isActive">
        <div class="search-card">
            <div class="search-wrapper">
                <div class="search-input-box">
                    <i class="bi bi-search search-icon"></i>
                    <input class="search-input" placeholder="Search" @input="inputChange" v-model="searchModel" />
                </div>
                <div class="search-cancel lg:hidden" @click="toggleActive(false)">Cancel</div>
            </div>

            <template v-if="isSearchEmpty">
                <SearchRecommendation />
            </template>
            <template v-else>
                <div class="flex flex-column gap-2 mt-3">
                    <div class="flex gap-3 autocomplete-hover py-2 pl-2   border-round-2xl">

                        <div class="autocomplete-img-wrapper">
                            <img src="@/assets/image/icon/confetti.svg"
                                style="width: 1.8rem;transform: rotate(5deg);" />
                        </div>
                        <div>
                            <div class="autocomplete-name">Pagelaran tarian </div>
                            <div>Sebuah palegaran tarian tahun 2024</div>
                        </div>
                    </div>
                    <div class="flex gap-3 autocomplete-hover py-2 pl-2   border-round-2xl">
                        <!-- TODO: convert to array data -->

                        <div class="autocomplete-img-wrapper">
                            <img src="@/assets/image/icon/confetti.svg"
                                style="width: 1.8rem;transform: rotate(5deg);" />
                        </div>
                        <div>
                            <div class="autocomplete-name">Pagelaran tarian </div>
                            <div>Sebuah palegaran tarian tahun 2024</div>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>

</template>

<style scoped>
.search-card-wrapper {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    min-height: 100vh;
    z-index: 40;
    display: grid;
    grid-template-columns: 1fr;
    grid-template-rows: 1fr;
    padding-block: 10px;
    background:
        linear-gradient(rgba(0, 0, 0, 0.6),
            rgba(0, 0, 0, 0.6))
}

.search-card {
    justify-self: center;
    max-width: 800px;
    padding: 15px 20px;
    height: 100%;
    background-color: white;
    width: 100%;
    flex-basis: 100%;
    border-radius: 8px;
    height: 100%;
}

.search-input-box {
    position: relative;
}

.search-input {
    background-color: #F2F2F2;
    border-radius: 17px;
    outline: none;
    font-weight: 500;
    width: 100%;
    border: 0;
    padding: 10px;
    padding-left: 45px;
}

.search-icon {
    position: absolute;
    left: 0;
    padding-left: 13px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 1.1rem;
}

.autocomplete-img-wrapper {
    background-color: #d6d6d6;
    padding: 10px 13px;
    aspect-ratio: 1/1;
    border-radius: 12px;
}

.autocomplete-name {
    font-weight: 600;
    font-size: 1.12rem;
}

.autocomplete-hover:hover {
    background-color: #F2F2F2;
}

.search-wrapper {
    display: grid;
    justify-content: center;
    align-items: center;
    gap: 10px;

    grid-template-columns: 1fr max-content;
}

.search-cancel {
    font-weight: 500;
    display: block;
}
</style>