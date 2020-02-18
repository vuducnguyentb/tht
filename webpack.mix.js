let mix = require('laravel-mix');
// const { mix } = require('laravel-mix');
// const mix = require('laravel-mix');
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

// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css');
mix.copyDirectory('resources/assets/tht', 'public/themes/tht');
// mix.js('resources/assets/js/app.js', 'public/js')

mix.styles([
    'resources/assets/tht/css/simple-line-icons.css',
    'resources/assets/tht/rs-plugin/css/settings.css',
    'resources/assets/tht/css/rev-style.css',
    'resources/assets/tht/css/plugin/jPushMenu.css',
    'resources/assets/tht/css/plugin/animate.css',
    'resources/assets/tht/css/plugin/jquery.fs.tipper.css',
    'resources/assets/tht/css/plugin/colorbox.css',
    'resources/assets/tht/css/plugin/mediaelementplayer.css',
    'resources/assets/tht/css/navigation.css',
    'resources/assets/tht/css/homeindex.css',
    'resources/assets/tht/css/style.css',
], 'public/themes/tht/css/all.css');

// mix.scripts([
//     'resources/assets/tht/js/plugin/jquery.stellar.min.js',
//     'resources/assets/tht/js/plugin/jPushMenu.js',
//     'resources/assets/tht/js/plugin/jquery.fs.tipper.min.js',
//     'resources/assets/tht/rs-plugin/js/jquery.themepunch.tools.min.js',
//     'resources/assets/tht/rs-plugin/js/jquery.themepunch.revolution.min.js',
//     'resources/assets/tht/js/revolution-custom.js',
//     'resources/assets/tht/js/plugin/mediaelement-and-player.min.js',
//     'resources/assets/tht/js/theme.js',
//     'resources/assets/tht/js/navigation.js',
// ], 'public/themes/tht/js/all.js');

//      'resources/assets/tht/js/jquery-1.12.4.min.js',
//      'resources/assets/tht/js/plugin/jquery.easing.js',
//      'resources/assets/tht/js/jquery-ui.min.js',
//      'resources/assets/tht/js/bootstrap.min.js',
//      'resources/assets/tht/js/plugin/jquery.flexslider.js',
//      'resources/assets/tht/js/plugin/background-check.min.js',
//      'resources/assets/tht/js/plugin/jquery.fitvids.js',
//      'resources/assets/tht/js/plugin/jquery.viewportchecker.js',
//      'resources/assets/tht/js/plugin/wow.min.js',
//      'resources/assets/tht/js/plugin/jquery.colorbox-min.js',
//      'resources/assets/tht/js/plugin/owl.carousel.min.js',
//      'resources/assets/tht/js/plugin/isotope.pkgd.min.js',
//      'resources/assets/tht/js/plugin/masonry.pkgd.min.js',
//      'resources/assets/tht/js/plugin/imagesloaded.pkgd.min.js',
