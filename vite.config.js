import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

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
            ],
            refresh: true,
        }),
    ],
});
