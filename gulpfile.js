var elixir = require('laravel-elixir');

var bowerPath = './vendor/bower_components';
var paths = {
    'jquery': bowerPath + '/jquery-legacy/dist',
    'bootstrap': bowerPath + '/bootstrap-sass/assets',
    'bootswatch': bowerPath + '/bootswatch-sass',
    'fontawesome': bowerPath + '/font-awesome',
    'metisMenu': bowerPath + '/metisMenu/dist',
    'dataTables': bowerPath + '/datatables/media',
    'dataTablesBootstrap3Plugin': bowerPath + '/datatables-bootstrap3-plugin/media'
};


/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function (mix) {
    //mix.less('app.less');

    // copy css for sass import
    mix.copy(paths.metisMenu + '/metisMenu.css', 'resources/assets/sass/metisMenu.scss');
    mix.copy(paths.dataTablesBootstrap3Plugin + '/css/datatables-bootstrap3.css', 'resources/assets/sass/dataTables-bootstrap3.scss');

    mix.sass('app.scss', 'public/css', {
        includePaths: [
            paths.bootstrap + '/stylesheets/',
            paths.bootswatch + '/',
            paths.fontawesome + '/scss/'
        ]
    });

    // copy fonts
    mix.copy(paths.bootstrap + '/fonts/bootstrap/**', 'public/fonts');
    mix.copy(paths.fontawesome + '/fonts/**', 'public/fonts');

    // copy scripts
    mix.copy(paths.jquery + '/jquery.min.js', 'public/js/vendor/jquery.js');
    mix.copy(paths.bootstrap + '/javascripts/bootstrap.min.js', 'public/js/vendor/bootstrap.js');
    mix.copy(paths.metisMenu + '/metisMenu.min.js', 'public/js/vendor/metisMenu.js');
    mix.copy(paths.dataTables + '/js/jquery.dataTables.min.js', 'public/js/vendor/dataTables.js');
    mix.copy(paths.dataTablesBootstrap3Plugin + '/js/datatables-bootstrap3.min.js', 'public/js/vendor/dataTables-bootstrap3.js');


    // Wasn't able to use scripts or scriptsIn!
    //mix.scripts([
    //        'vendor/jquery.js',
    //        'vendor/bootstrap.js'
    //    ], 'public/js/vendor.js','public/js');

    //mix.scripts([
    //    paths.jquery + '/jquery.js',
    //    paths.bootstrap + '/javascripts/bootstrap.js'
    //], 'public/js/vendor.js', './');

    //mix.scripts([
    //    'jquery-legacy/dist/jquery.js',
    //    'bootstrap-sass-official/assets/javascripts/bootstrap.js'
    //], 'public/js/app.min.js', 'vendor/bower_components');

    // Cache-bust app.css
    mix.version('public/css/app.css');
});

