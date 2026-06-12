import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/pages/auth-password.js',
                'resources/js/pages/auth-two-factor.js',
                'resources/js/pages/dashboard-projects.js',
                'resources/js/pages/form-choice.js',
                'resources/js/pages/form-quilljs.js',
                'resources/js/pages/rich-text.js',
                'resources/js/pages/calendar.js',
                'resources/js/pages/project-schedule.js',
                'resources/js/vendor.js'
            ],
            refresh: true,
        }),
        tailwindcss()
    ],
});
