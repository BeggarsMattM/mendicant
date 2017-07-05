const { mix } = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
  .styles([
    "resources/assets/css/fourad3.css",
    "resources/assets/css/slick.css",
    "resources/assets/css/slick-theme.css",
    "resources/assets/css/colorbox.css"
  ], "public/css/all.css")
  .scripts([
    "resources/assets/js/app.js",
    "resources/assets/js/script.js",
    "resources/assets/js/jquery.colorbox.js",
    "resources/assets/js/nivo-lightbox.js",
    "resources/assets/js/slick.min.js"
  ], "public/js/all.js")
