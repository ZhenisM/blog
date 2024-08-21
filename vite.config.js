import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import { resolve } from 'path'; 

export default defineConfig({
    plugins: [
    	vue(),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    build: {
        rollupOptions: {
            input: {
                main: resolve(__dirname, 'resources/js/app.js'), // Используем resolve для корректного пути
            },
            output: {
                assetFileNames: 'assets/[name]-[hash][extname]', // Настройка именования файлов
            },
        },
    },
});
