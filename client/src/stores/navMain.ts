import { defineStore } from 'pinia';
import {ref} from 'vue';

export const navMainStore = defineStore('navMain',() => {
    const height = ref<number>(0);
    const shouldOverlap = ref<boolean>(false);

    return {shouldOverlap,height}
});