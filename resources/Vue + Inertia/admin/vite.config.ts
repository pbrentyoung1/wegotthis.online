import { wayfinder } from '@laravel/vite-plugin-wayfinder';
import laravel from 'laravel-vite-plugin';
import { defineConfig } from 'vite';
import path from 'path';
import vue from '@vitejs/plugin-vue';
import Components from 'unplugin-vue-components/vite'
import { BootstrapVueNextResolver } from 'bootstrap-vue-next';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.ts'],
            ssr: 'resources/js/ssr.ts',
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
        Components({
            resolvers: [BootstrapVueNextResolver()],
        }),
        wayfinder({
            formVariants: true,
        }),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
    resolve: {
        alias: {
            '@/': path.resolve(__dirname, './resources/js'),
            '/images': path.resolve(__dirname, 'public/images'),
            '@/data': path.resolve(__dirname, 'resources/data'),
            '@/scss': path.resolve(__dirname, 'resources/scss'),
        },
    },
});
