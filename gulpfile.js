var gulp = require('gulp');
var bower = require('gulp-bower');
var elixir = require('laravel-elixir');

gulp.task('bower', function() {
    return bower();
});

var vendors = '../../vendor/';

var paths = {
    'jquery': vendors + '/jquery/dist',
    'bootstrap': vendors + '/bootstrap/dist',
    'bootswatch': vendors + '/bootswatch/simplex',
    'fontawesome': vendors + '/font-awesome',
    'colorbox': vendors + '/jquery-colorbox',
    'dataTables': vendors + '/datatables/media',
    'dataTablesBootstrap3Plugin': vendors + '/datatables-bootstrap3-plugin/media',
    'flag': vendors + '/flag-sprites/dist',
    'metisMenu': vendors + '/metisMenu/dist',
    'datatablesResponsive': vendors + '/datatables-responsive',
    'summernote': vendors + '/summernote/dist',
    'select2': vendors + '/select2/dist',
    'jqueryui':  vendors + '/jquery-ui',
    'justifiedGallery':  vendors + '/Justified-Gallery/dist/'
};

elixir.config.sourcemaps = false;

elixir(function(mix) {

    // Run bower install
    mix.task('bower');

    // Copy fonts straight to public
    mix.copy('resources/vendor/bootstrap/dist/fonts/**', 'public/fonts');
    mix.copy('resources/vendor/font-awesome/fonts/**', 'public/fonts');
    mix.copy('resources/vendor/summernote/dist/font/**', 'public/css/font');

    // Copy images straight to public
    mix.copy('resources/vendor/jquery-colorbox/example3/images/**', 'public/css/images');
    mix.copy('resources/vendor/jquery-ui/themes/base/images/**', 'public/css/images');


    // Copy flag resources
    mix.copy('resources/vendor/flag-sprites/dist/css/flag-sprites.min.css', 'public/css/flags.css');
    mix.copy('resources/vendor/flag-sprites/dist/img/flags.png', 'public/img/flags.png');

    // Merge Site CSSs.
    mix.styles([
        paths.bootstrap + '/css/bootstrap.css',
        paths.bootstrap + '/css/bootstrap-theme.css',
        paths.fontawesome + '/css/font-awesome.css',
        paths.bootswatch + '/bootstrap.css',
        paths.colorbox + '/example3/colorbox.css',
        paths.justifiedGallery + '/css/justifiedGallery.css'
    ], 'public/css/site.css');

    // Merge Site scripts.
    mix.scripts([
        paths.jquery + '/jquery.js',
        paths.bootstrap + '/js/bootstrap.js',
        paths.colorbox + '/jquery.colorbox.js',
        paths.justifiedGallery + '/js/jquery.justifiedGallery.js'
    ], 'public/js/site.js');

    // Merge Admin CSSs.
    mix.styles([
        paths.bootstrap + '/css/bootstrap.css',
        paths.bootstrap + '/css/bootstrap-theme.css',
        paths.fontawesome + '/css/font-awesome.css',
        paths.bootswatch + '/bootstrap.css',
        paths.colorbox + '/example3/colorbox.css',
        paths.dataTables + '/css/dataTables.bootstrap.css',
        paths.dataTablesBootstrap3Plugin + '/css/datatables-bootstrap3.css',
        paths.metisMenu + '/metisMenu.css',
        paths.summernote + '/summernote.css',
        paths.select2 + '/css/select2.css',
        paths.jqueryui + '/themes/base/minified/jquery-ui.min.css',
        'sb-admin-2.css',
    ], 'public/css/admin.css');

    // Merge Admin scripts.
    mix.scripts([
        paths.jquery + '/jquery.js',
        paths.jqueryui + '/ui/jquery-ui.js',
        paths.bootstrap + '/js/bootstrap.js',
        paths.colorbox + '/jquery.colorbox.js',
        paths.dataTables + '/js/jquery.dataTables.js',
        paths.dataTables + '/js/dataTables.bootstrap.js',
        paths.dataTablesBootstrap3Plugin + '/js/datatables-bootstrap3.js',
        paths.datatablesResponsive + '/js/dataTables.responsive.js',
        paths.metisMenu + '/metisMenu.js',
        paths.summernote + '/summernote.js',
        paths.select2 + '/js/select2.js',
        'bootstrap-dataTables-paging.js',
        'dataTables.bootstrap.js',
        'datatables.fnReloadAjax.js',
        'sb-admin-2.js',
    ], 'public/js/admin.js');

});
