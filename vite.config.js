import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';
import vue from '@vitejs/plugin-vue';


export default defineConfig({
    plugins: [
       
        laravel({
            input: [ 'resources/css/app.css','resources/sass/app.scss','resources/js/app.js' ],
            refresh: true,
        }),
        vue(),
    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
        }
    },
});
