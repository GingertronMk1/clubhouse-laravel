import { defineConfig } from "vite";
import eslint from "vite-plugin-eslint";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";

export default defineConfig({
    plugins: [
        laravel({
            input: "resources/js/app.js",
            refresh: true,
            ssr: "resources/js/ssr.js",
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
            include: ["resources/**/*.{vue,js,ts,jsx,tsx}"],
        }),
    ],
    server: {
        host: "0.0.0.0",
        port: 5173,
    },
});
