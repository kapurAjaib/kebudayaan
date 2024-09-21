import { fileURLToPath, URL } from 'node:url';

import { defineConfig } from 'vite';
import Components from 'unplugin-vue-components/vite';
import vue from '@vitejs/plugin-vue';

// https://vitejs.dev/config/
export default defineConfig({
    plugins: [
        vue(),
        Components({
            directoryAsNamespace: true,
            dts: true,
            resolvers: [
                (componentName) => {
                    const prefix = 'Prime';
                    if (componentName.startsWith(prefix)) {
                        const path = `primevue/${componentName
                            .slice(prefix.length)
                            .toLowerCase()}`;

                        return {
                            from: path,
                        };
                    }
                }
            ],
        }),
    ],
    resolve: {
        alias: {
            '@': fileURLToPath(new URL('./src', import.meta.url)),
        },
    },
});
