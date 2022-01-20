const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/admin.js', 'public/js')
    .js('resources/js/admin_after.js', 'public/js')
    .js('resources/js/turbolinks.js', 'public/js')
    // .js('resources/js/editor.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
    ])
    .sass('resources/sass/base.scss', 'public/css');

// mix.browserSync('tall-admin.test').options({
//     reloadDelay: 1000,
// });
