import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.scss',
                'resources/css/quiz.scss',
                'resources/css/user.scss',
                'resources/js/app.js',
                'resources/js/auth.js',
                'resources/js/masks.js',
                'resources/js/notify.js',
                'resources/js/moderator.js',
                'resources/js/expert.js',
                'resources/js/user.js',
            ],
            refresh: true,
        }),
    ],
});
