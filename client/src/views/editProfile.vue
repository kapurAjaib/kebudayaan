<script lang="ts" setup>
import { navMainStore } from '@/stores/navMain';
import { ref } from 'vue';
const navState = navMainStore();
const fileInput = ref<HTMLInputElement>();
const getFile = () => {
    fileInput.value?.click();
}
</script>
<template>
    <div class="edit-profile" :style="{ 'padding-top': `${navState.height}px` }">
        <div class="container-full">
            <input type="file" class="hidden" ref="fileInput" />

            <div class="grid py-4 px-3">
                <div class="col-3  px-3 hidden md:block">
                    <div class="px-5 bg-white py-4">
                        <div class="profile-pic" @click="getFile"></div>
                    </div>
                </div>
                <div class="md:col-9 bg-white px-4 py-6 border-round-md col-12">
                    <div class="sm:px-8 px-5 bg-white py-4 md:hidden">
                        <div class="profile-pic" @click="getFile"></div>
                    </div>
                    <h1 class="mt-0 mb-0"> Data akun</h1>
                    <form class="edit-profile-form px-2 mt-3">
                        <div class="input-group">
                            <div class="font-medium">USERNAME</div>
                            <input placeholder="Example: John doe" class="input-data-account" value="example" />
                        </div>
                        <div class="input-group mt-4">
                            <div class="font-medium">Email</div>
                            <input placeholder="Example: johndoe@example.com" class="input-data-account" disabled
                                value="example@gmail.com" />
                        </div>
                        <div class="input-group mt-4">
                            <div class="font-medium">Display Name</div>
                            <input placeholder="Example: John doe" class="input-data-account" value="example" />
                        </div>
                    </form>
                    <div class="flex  mt-5 px-2">
                        <button class="save-change-btn">Simpan Perubahan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style scoped>
.profile-pic {
    width: 100%;
    border-radius: 50%;
    aspect-ratio: 1/1;

    background-color: black;
}

.edit-profile {
    background-color: #F7F7F7;
}

.edit-profile-form {
    max-width: 500px;
    width: 100%;
}

.input-data-account {
    background-color: #F2F2F2;
    border: none;
    width: 100%;
    padding: 15px 20px;
    border-radius: 8px;
}

.input-data-account:disabled {
    background-color: #d7d2d2;
}

.save-change-btn {
    background-color: #00A3FF;
    color: white;
    border: none;
    border-radius: 8px;
    padding: 10px 15px;
}
</style>