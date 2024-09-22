<script setup lang="ts">
import type Popover from 'primevue/popover';
import { ref } from 'vue';
import type { ComponentExposed } from 'vue-component-type-helpers';

const isDialogReplyVisible = ref(false);
const selectedComment = ref<number>();
const showDialogReply = (id: number) => {
    selectedComment.value = id;
    isDialogReplyVisible.value = true;
}

const hideDialogReply = () => {
    isDialogReplyVisible.value = false;
}


const toggleCommentOp = (evt: Event) => {
    commentOp.value?.toggle(evt);
}

const commentOp = ref<ComponentExposed<typeof Popover>>();

</script>
<template>
    <div class="comment-list mt-4">
        <div class="comment-item">
            <div class="comment-profile-pic">
                <img src="@/assets/image/home/grid-img1.jpg" width="32" height="32" />
            </div>
            <div>
                <div class="flex justify-content-between">
                    <div class="font-medium pb-1">Putu Adi</div>
                    <div class="text-lg comment-btn-action" @click="toggleCommentOp">
                        <i class="bi bi-three-dots-vertical"></i>
                    </div>

                </div>
                <div class="comment-content">
                    Indonesia kaya banget sama budaya! 😍 Dari Sabang sampai Merauke, tiap daerah punya tradisi, bahasa,
                    dan adat istiadat yang keren banget. Bangga jadi orang Indonesia! 🇮🇩❤️ Ayo kita jaga dan
                    lestarikan budaya kita biar nggak hilang ditelan zaman 🙌 #BanggaBudayaIndonesia #LestarikanBudaya
                </div>
                <div class="mt-2 flex gap-4">

                    <div class="flex gap-2 align-items-center font-medium" @click="showDialogReply(0)">
                        <i class="bi bi-chat text-xl"></i>
                        Balas
                    </div>
                    <!-- <div class="flex gap-2 align-items-center font-medium">
                        Lihat Balasan
                    </div> -->
                </div>
            </div>

        </div>


    </div>
    <PrimePopover ref="commentOp">
        <div class="comment-action-list">
            <div>Laporkan komentar</div>
        </div>
    </PrimePopover>
    <PrimeDialog v-model:visible="isDialogReplyVisible" :draggable="false" modal
        :style="{ 'max-width': '400px', 'width': 'calc(100% - 10px)' }">
        <template #header>
            <div class="inline-flex items-center justify-center gap-2">
                <span class="font-bold whitespace-nowrap">Balas Komentar</span>
            </div>
        </template>
        <div>
            <textarea class="w-full input-comment-reply" placeholder="Balas" rows="4"></textarea>

        </div>
        <div class="mt-2">
            <button class="comment-send-btn">Kirim</button>
            <button class="comment-reply-cancel-btn ml-3" @click="hideDialogReply">Batal</button>
        </div>
    </PrimeDialog>
</template>
<style scoped>
.comment-item {
    column-gap: 15px;
    display: grid;
    grid-template-columns: max-content 1fr;
}

.comment-profile-pic>img {
    border-radius: 50%;
    object-fit: cover;
}

.comment-btn-action {
    padding-left: 13px;
}

.comment-input {
    border: solid 1px rgb(193, 194, 194);
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

.comment-reply-cancel-btn {
    border: 0;
    font-weight: 600;
    color: white;
    padding: 7px 20px;
    border-radius: 8px;
    background-color: rgb(228, 16, 16);
    transition: background-color 500ms;
}

.input-comment-reply {
    padding: 10px;
    border: solid 1px rgb(193, 194, 194);
    border-radius: 8px;
    outline: none;
}
</style>