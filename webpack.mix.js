const mix = require('laravel-mix');
const assets = 'public/assets/';
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css');


mix.styles([
    assets+'css/backend-plugin.min.css',
    assets+'css/backende209.css',
    assets+'css/custom.css',
    assets+'vendor/fortawesome/fontawesome-free/css/all.min.css',
    assets+'vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css',
    assets+'vendor/remixicon/remixicon.css',
], assets+'css/all.css');

//All js added
mix.scripts([
    assets+'js/backend-bundle.min.js',
    assets+'/js/table-treeview.js',
    assets+'/js/customizer.js',
    assets+'/js/chart-custom.js',
    assets+'/js/app.js',
], assets+'js/all.js');

