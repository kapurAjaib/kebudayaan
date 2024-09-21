<script lang="ts" setup>
import { ref, onMounted, nextTick } from 'vue';
import { type ComponentExposed } from 'vue-component-type-helpers'
import { navMainStore } from '@/stores/navMain';
import NavSearch from './NavSearch.vue';
const navSearch = ref<ComponentExposed<typeof NavSearch>>();

const state = navMainStore();
const nav = ref<HTMLElement>();
const activeNavSearch = () => {
    navSearch.value?.toggleActive(true);
}
onMounted(async () => {
    await nextTick();
    state.height = nav.value?.clientHeight || 0;
});


</script>
<template>
    <nav class="fixed nav w-full" ref="nav" v-show="!state.hide">
        <div class="navbar-nav  w-full gap-4 align-items-center">
            <div class="logo">
            </div>
            <div class="flex gap-4 nav-link">
                <div>
                    <RouterLink to="/" class="router-link">
                        Home
                    </RouterLink>
                </div>
                <div>Budaya</div>
                <div>Acara</div>
                <div>Contact</div>
            </div>
            <div class="justify-content-end w-full flex gap-4 align-items-center">
                <div class="search relative " @click="activeNavSearch">
                    <i class="bi bi-search  search-icon"></i>
                    <input type="text" class="search-input" placeholder="Search" :value="navSearch?.searchModel" />
                </div>
                <div>Login</div>
                <div class="nav-register">Register</div>
            </div>
        </div>
    </nav>
    <NavSearch ref="navSearch" />
</template>
<style scoped>
.logo {
    padding: 20px;
    border-radius: 50%;
    background-color: gray;
}

.nav {
    z-index: 25;
    background-color: white;
}

.navbar-nav {
    display: flex;
    z-index: 50;
    font-size: 1.1rem;
    align-items: center;
    padding: 12px 28px;
    font-weight: 500;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
}

.search {
    max-width: 265px;
    width: 100%;
    font-size: 1.15rem;
}

.search-input {
    width: 100%;
    border-radius: 5px;
    padding: 6px 10px;
    padding-left: 40px;
    border: solid 1px #F2F2F2;
    background-color: #F2F2F2;
    outline: none;
}

.search-icon {
    padding-inline: 10px;
    transform: translateY(-50%);
    top: 50%;
    left: 0;
    position: absolute;
}

.router-link {
    color: #00A3FF;
    position: relative;
    padding-bottom: 2px;
    text-decoration: none;
}

.router-link:hover::before {
    position: absolute;
    bottom: -1px;
    border-radius: 20px;
    content: '';
    width: 100%;
    height: 3px;
    background-color: rgb(60, 10, 239);
}

.nav-register {
    border-radius: 8px;
    padding: 8px 13px;
    color: white;
    background-color: #00A3FF;
}
</style>