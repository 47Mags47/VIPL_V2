import { defineConfig, loadEnv } from 'vite';
import laravel from 'laravel-vite-plugin';

const env = loadEnv('all', process.cwd());

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // ### Стили
                // ##################################################
                'resources/sass/app.sass',

                // ### Скрипты
                // ##################################################
                'resources/js/app.js',
                'resources/js/fontAwesome.js',
            ],
            refresh: true,
        }),
    ],

    css: {
        preprocessorOptions: {
            sass: {
                api: 'modern-compiler',
            }
        }
    },

    server: {
        host: true,
        port: env.VITE_ASSET_PORT,
        strictPort: true,
        hmr: {
            host: env.VITE_ASSET_HOST,
            port: env.VITE_ASSET_PORT,
        },
    },
});
