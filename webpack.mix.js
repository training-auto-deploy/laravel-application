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

mix.js('resources/js/app.js', 'public/js')
	.js('resources/js/admin/admin-layout.js', 'public/js/admin')
	.combine(['resources/js/user/*'], 'public/js/user/user-layout.js')
	.styles(['resources/sass/user/*.css'], 'public/css/user/all.css')
	.copyDirectory('resources/plugins', 'public/plugins')
	.copyDirectory('resources/images', 'public/images')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/admin/admin-layout.scss', 'public/css/admin')
    .sass('resources/sass/admin/icon.scss', 'public/css/admin')
    .sass('resources/sass/student-firsttime.scss', 'public/css/');
