import './assets/global.css';
import { createApp } from 'vue';
import { createPinia } from 'pinia';
import { PrimeVue } from '@primevue/core';
import App from './App.vue';
import router from './router';
import Aura from '@primevue/themes/aura';




const app = createApp(App);
app.use(PrimeVue, {
    theme: {
        preset: Aura,
        options: {
            cssLayer: {
                name: 'primevue',
                order: 'global, primevue',
            },
            darkModeSelector: '.app-dark',
        },
    },
});
app.use(createPinia());
app.use(router);

app.mount('#app');
