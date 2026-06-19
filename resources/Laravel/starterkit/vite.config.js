import { defineConfig, loadEnv } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig(({ mode }) => {
    const env = loadEnv(mode, process.cwd(), '');
    const hmrHost = env.VITE_HMR_HOST || 'localhost';

    return {
    server: {
        host: '0.0.0.0',
        origin: `http://${hmrHost}:5173`,
        hmr: { host: hmrHost },
    },
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
                'resources/js/pages/profile-image.js',
                'resources/js/pages/project-view-switcher.js',
                'resources/js/pages/rich-text.js',
                'resources/js/pages/calendar.js',
                'resources/js/pages/photo-upload.js',
                'resources/js/pages/photo-crop.js',
                'resources/js/pages/board.js',
                'resources/js/vendor.js'
            ],
            refresh: true,
        }),
        tailwindcss()
    ],
    };
});
