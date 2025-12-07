import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    server: {
        host: process.env.VITE_DEV_SERVER_HOST || 'localhost',
        port: parseInt(process.env.VITE_DEV_SERVER_PORT) || 5173,
        strictPort: true,
        cors: true,
        hmr: {
            host: process.env.VITE_DEV_SERVER_HOST || 'localhost',
            protocol: 'ws',
        },
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
