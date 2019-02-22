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
    'resources/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js',
    'resources/assets/plugins/masked-input/masked-input.min.js',
    'resources/assets/plugins/pace/pace.min.js',
    'resources/assets/plugins/smooth-scrollbar/smooth-scrollbar.js',
    'resources/assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
    'resources/assets/plugins/placeholders/placeholders.js',
    'resources/assets/plugins/jquery-validate/jquery.validate.min.js',
    'resources/assets/js/extra-signup.js',
    'resources/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js',
    'resources/assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js',
    'resources/assets/plugins/bootstrap-daterangepicker/moment.js',
    'resources/assets/plugins/bootstrap-daterangepicker/daterangepicker.js',
    'resources/assets/plugins/dragula/dragula.min.js',
    'resources/assets/plugins/sly/plugins.js',
    'resources/assets/plugins/sly/sly.min.js',
    'resources/assets/plugins/sly/horizontal.js',
    'resources/assets/js/app.js',
], 'public/js/app.min.js').sourceMaps().version();


mix.scripts([
    'resources/assets/plugins/DataTables/media/js/jquery.dataTables.js',
    'resources/assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js',
    'resources/assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js',
    'resources/assets/plugins/DataTables/extensions/Buttons/js/buttons.print.min.js',
    'resources/assets/plugins/DataTables/extensions/Buttons/js/pdfmake.min.js',
    'resources/assets/plugins/DataTables/extensions/Buttons/js/vfs_fonts.min.js',
    'resources/assets/plugins/DataTables/extensions/Buttons/js/buttons.html5.min.js',
    'resources/assets/plugins/DataTables/extensions/Buttons/js/dataTables.buttons.min.js',
    'resources/assets/plugins/DataTables/extensions/Buttons/js/buttons.bootstrap.min.js',
    'resources/assets/plugins/DataTables/extensions/Buttons/js/buttons.flash.min.js',
    'resources/assets/plugins/DataTables/extensions/FixedHeader/js/dataTables.fixedHeader.min.js',
    'resources/assets/plugins/DataTables/extensions/ColReorder/js/dataTables.colReorder.min.js',
    'resources/assets/plugins/DataTables/extensions/Buttons/js/jszip.min.js',
], 'public/js/datatable.min.js').sourceMaps().version();
