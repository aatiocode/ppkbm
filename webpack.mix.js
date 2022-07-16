const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js/app.js')
  .js('resources/js/jquery.nice-select.js', 'public/js/app.js')
  .js('resources/js/owlcarousel.js', 'public/js/app.js')
  .js('resources/js/owl-carousel-thumb.js', 'public/js/app.js')
  .js('resources/js/ajaxchimp.js', 'public/js/app.js')
  .js('resources/js/theme.js', 'public/js/app.js')
	.sass('resources/sass/app.scss', 'public/css')
  .css('resources/css/flaticon.css', 'public/css')
  .css('resources/css/landing.css', 'public/css')
  .css('resources/css/owlcarousel.css', 'public/css')
