import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/admin.css',
                'resources/js/app.js',
                'resources/js/admin.js',
                'resources/js/markdown-to-pdf.js',
                'resources/css/markdown-to-pdf.css',
            ],
            refresh: true,
        }),
        vue(),
    ],
    server: {
         watch: {
            ignored: [
                '**/vendor/**/*',
                '**/node_modules/**/*',
                '**/storage/**/*',
            ],
        },
    },
    publicDir: process.env.NODE_ENV !== 'production' ? './public' : null,
});
