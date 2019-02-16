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

mix
    .sass('resources/assets/sass/app.scss', 'public/css/app.min.css').sourceMaps().version().extract()
    .js('resources/assets/plugins/modernizr/modernizr-custom.js', 'public/js/modernizr-custom.min.js').sourceMaps().version().extract();

mix.scripts([
    'resources/assets/plugins/jquery/jquery.min.js',
    'resources/assets/plugins/toastr/toastr.min.js',
    'resources/assets/plugins/jquery-ui-1.12.1.custom/jquery-ui.min.js',
    'resources/assets/plugins/popper/popper.min.js',
    'resources/assets/plugins/bootstrap/js/bootstrap.min.js',
    'resources/assets/js/slidebar/slidebar.js',
    'resources/assets/js/classie.js',
    'resources/assets/plugins/pace/pace.min.js',
    'resources/assets/plugins/smooth-scrollbar/smooth-scrollbar.js',
    'resources/assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
    'resources/assets/plugins/placeholders/placeholders.js',
    'resources/assets/plugins/jquery-validate/jquery.validate.min.js',
    'resources/assets/js/extra-signup.js',
    'resources/assets/js/app.js',
], 'public/js/app.min.js').sourceMaps().version();
