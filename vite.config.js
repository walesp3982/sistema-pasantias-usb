import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: ['resources/views/**'],
        }),
    ],
    server: {
        host: 'localhost',
    },
    watch: {
        usePolling: false,
        ignored: [
            '**/vendor/**',           // 60 MB ignorados
            '**/node_modules/**',     // 88 MB ignorados
            '**/storage/**',          // 8 MB ignorados
            '**/bootstrap/cache/**',
            '**/public/build/**',
            '**/database/**',
            '**/.git/**',
            '**/tests/**',
        ]
    }
});
