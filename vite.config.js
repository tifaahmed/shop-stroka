import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'
const path = require('path')


export default defineConfig({
    resolve:{
        extensions: ['*', '.js', '.jsx', '.vue', '.ts', '.tsx'],

        alias:{
            vue: "vue/dist/vue.esm-bundler.js",
            '@' : path.resolve(__dirname, './src'),
            MainServices: path.resolve(__dirname, 'resources/js/Services'),
            AdminAsset: path.resolve(__dirname, 'public/asset_ar'),
            AdminFolders: path.resolve(__dirname, 'resources/js/Admin'),
            AdminModels: path.resolve(__dirname, 'resources/js/Admin/Models'),
            AdminPartials: path.resolve(__dirname, 'resources/js/Admin/Partials'),
            AdminPartialsModal: path.resolve(__dirname, 'resources/js/Admin/Partials/Components/Modal'),
            AdminValidations: path.resolve(__dirname, 'resources/js/Admin/Validation'),
            AdminRoutes: path.resolve(__dirname, 'resources/js/Admin/Routes'),
            AdminViews: path.resolve(__dirname, 'resources/js/Admin/Views'),
        },
      },
    plugins: [
        vue(),
        laravel([
            'resources/css/app.css',
            'resources/js/app.js',
        ]),
    ],
});