var gulp = require('gulp');
var bower = require('gulp-bower');
var elixir = require('laravel-elixir');

gulp.task('bower', function() {
    return bower();
});

var paths = {
    'jquery': 'vendor/jquery/dist',
    'bootstrap': 'vendor/bootstrap/dist',
    'bootswatch': 'vendor/bootswatch/simplex',
    'fontawesome': 'vendor/font-awesome',
    'colorbox': 'vendor/jquery-colorbox',
    'dataTables': 'vendor/datatables/media',
    'dataTablesBootstrap3Plugin': 'vendor/datatables-bootstrap3-plugin/media',
    'flag': 'vendor/flag-sprites/dist',
    'metisMenu': 'vendor/metisMenu/dist',
    'datatablesResponsive': 'vendor/datatables-responsive',
    'summernote': 'vendor/summernote/dist',
    'select2': 'vendor/select2/dist',
    'jquery_ui':  'vendor/jquery-ui',
    'justifiedGallery':  'vendor/Justified-Gallery/dist/',
};

elixir.config.sourcemaps = false;

elixir(function(mix) {

    // Run bower install
    mix.task('bower');

    // Copy fonts straight to public
    mix.copy('resources/' + paths.bootstrap + '/fonts/bootstrap/**', 'public/fonts');
    mix.copy('resources/' + paths.fontawesome + '/fonts/**', 'public/fonts');

    // Copy images straight to public
    mix.copy('resources/' + paths.colorbox + '/example3/images/**', 'public/css/images');
    mix.copy('resources/' + paths.jquery_ui + '/themes/base/images/**', 'public/css/images');


    // Copy flag resources
    mix.copy('resources/' + paths.flag + '/css/flag-sprites.min.css', 'public/css/flags.css');
    mix.copy('resources/' + paths.flag + '/img/flags.png', 'public/img/flags.png');

    // Merge Site CSSs.
    mix.styles([
        '../../' + paths.bootstrap + '/css/bootstrap.css',
        '../../' + paths.bootstrap + '/css/bootstrap-theme.css',
        '../../' + paths.fontawesome + '/css/font-awesome.css',
        '../../' + paths.bootswatch + '/bootstrap.css',
        '../../' + paths.colorbox + '/example3/colorbox.css',
        '../../' + paths.justifiedGallery + '/css/justifiedGallery.css'
    ], 'public/css/site.css');

    // Merge Site scripts.
    mix.scripts([
        '../../' + paths.jquery + '/jquery.js',
        '../../' + paths.bootstrap + '/js/bootstrap.js',
        '../../' + paths.colorbox + '/jquery.colorbox.js',
        '../../' + paths.justifiedGallery + '/js/jquery.justifiedGallery.js'
    ], 'public/js/site.js');

    // Merge Admin CSSs.
    mix.styles([
        '../../' + paths.bootstrap + '/css/bootstrap.css',
        '../../' + paths.jquery_ui + '/themes/base/jquery.ui.all.css',
        '../../' + paths.bootstrap + '/css/bootstrap-theme.css',
        '../../' + paths.fontawesome + '/css/font-awesome.css',
        '../../' + paths.bootswatch + '/bootstrap.css',
        '../../' + paths.colorbox + '/example3/colorbox.css',
        '../../' + paths.dataTables + '/css/dataTables.bootstrap.css',
        '../../' + paths.dataTablesBootstrap3Plugin + '/css/datatables-bootstrap3.css',
        '../../' + paths.metisMenu + '/metisMenu.css',
        '../../' + paths.summernote + '/summernote.css',
        '../../' + paths.summernote + '/summernote-bs3.css',
        '../../' + paths.select2 + '/css/select2.css',
        'sb-admin-2.css',
    ], 'public/css/admin.css');

    // Merge Admin scripts.
    mix.scripts([
        '../../' + paths.jquery + '/jquery.js',
        '../../' + paths.jquery_ui + '/ui/jquery.ui.core.js',
        '../../' + paths.bootstrap + '/js/bootstrap.js',
        '../../' + paths.colorbox + '/jquery.colorbox.js',
        '../../' + paths.dataTables + '/js/jquery.dataTables.js',
        '../../' + paths.dataTables + '/js/dataTables.bootstrap.js',
        '../../' + paths.dataTablesBootstrap3Plugin + '/js/datatables-bootstrap3.js',
        '../../' + paths.datatablesResponsive + '/js/dataTables.responsive.js',
        '../../' + paths.metisMenu + '/metisMenu.js',
        '../../' + paths.summernote + '/summernote.js',
        '../../' + paths.select2 + '/js/select2.js',
        'bootstrap-dataTables-paging.js',
        'dataTables.bootstrap.js',
        'datatables.fnReloadAjax.js',
        'sb-admin-2.js'
    ], 'public/js/admin.js');

});
