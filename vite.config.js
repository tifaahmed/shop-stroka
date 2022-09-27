import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';


export default defineConfig({

    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    // The Vue plugin will re-write asset URLs, when referenced
                    // in Single File Components, to point to the Laravel web
                    // server. Setting this to `null` allows the Laravel plugin
                    // to instead re-write asset URLs to point to the Vite
                    // server instead.
                    base: null,

                    // The Vue plugin will parse absolute URLs and treat them
                    // as absolute paths to files on disk. Setting this to
                    // `false` will leave absolute URLs un-touched so they can
                    // reference assets in the public directly as expected.
                    includeAbsolute: false,
                },
            },
        }),
    ],
    server: {
        https: true,
        host: 'localhost',
    },
    resolve: {
        alias: {
            // 'vue': 'vue/dist/vue.esm-bundler.js'
            MainServices: path.resolve(__dirname, 'resources/js/Services'),


            AdminAsset: path.resolve(__dirname, 'public/asset_ar'),

            AdminFolders: path.resolve(__dirname, 'resources/js/Admin'),
            AdminModels: path.resolve(__dirname, 'resources/js/Admin/Models'),
            AdminPartials: path.resolve(__dirname, 'resources/js/Admin/Partials'),
            AdminPartialsModal: path.resolve(__dirname, 'resources/js/Admin/Partials/Components/Modal'),
            AdminValidations: path.resolve(__dirname, 'resources/js/Admin/Validation'),
            AdminRoutes: path.resolve(__dirname, 'resources/js/Admin/Routes'),
            AdminViews: path.resolve(__dirname, 'resources/js/Admin/Views'),

            SiteFolders: path.resolve(__dirname, 'resources/js/Site'),
            SiteModels: path.resolve(__dirname, 'resources/js/Site/Models'),
            SitePartials: path.resolve(__dirname, 'resources/js/Site/Partials'),
            SiteViews: path.resolve(__dirname, 'resources/js/Site/Views'),
        }
    },
});