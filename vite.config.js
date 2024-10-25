import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    server: {
        host: 'key_management.test',  // The URL you want to use
        // port: 3000,                      // Set to 80 for HTTP
        https: false,                  // Disable HTTPS
        open: true,                    // Automatically open in the browser
    },
});
