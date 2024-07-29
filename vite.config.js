import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import eslint from 'vite-plugin-eslint';

export default defineConfig({
    server: {
        host: "0.0.0.0",
        port: 5173
    },
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            ssr: 'resources/js/ssr.js',
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
        eslint({
            fix: true,
            include: ['resources/**/*.{vue,js,ts,jsx,tsx}'],
        })
    ],
});
