import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/css/admin.css', 'resources/js/app.js', 'resources/js/admin.js'],
            refresh: true,
        }),
    ],
    server: {
         watch: {
            ignored: [
                '**/vendor/**/*',
                '**/wp-content.x/**/*',
                '**/storage/**/*',
            ],
        },
    },
    publicDir: process.env.NODE_ENV !== 'production' ? './public' : null,
});
