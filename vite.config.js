import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

import { readdirSync } from 'fs';

const cssFiles = readdirSync('resources/css').filter((file) => file.startsWith('app-')).map((file) => `resources/css/${file}`);
const jsFiles = readdirSync('resources/js').filter((file) => file.startsWith('app-')).map((file) => `resources/js/${file}`);

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', ...cssFiles, 'resources/js/app.js', ...jsFiles],
            refresh: true,
        }),
    ],
});
