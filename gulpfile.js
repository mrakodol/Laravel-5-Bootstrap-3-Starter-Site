var elixir = require('laravel-elixir');

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

var bowerPath = './vendor/bower_components';

var paths = {
    'jquery': bowerPath + '/jquery-legacy/dist',
    'bootstrap': bowerPath + '/bootstrap-sass/assets',
    'bootswatch': bowerPath + '/bootswatch-sass',
    'fontawesome': bowerPath + '/font-awesome',
    'metisMenu': bowerPath + '/metisMenu/dist',
    'colorbox': bowerPath + '/jquery-colorbox',
    'dataTables': bowerPath + '/datatables/media',
    'dataTablesBootstrap3Plugin': bowerPath + '/datatables-bootstrap3-plugin/media'
};

elixir(function (mix) {

    // Copy CSSs to default resource directory
    mix.copy(paths.metisMenu + '/metisMenu.css', 'resources/css/metisMenu.css');
    mix.copy(paths.colorbox + '/example3/colorbox.css', 'resources/css/colorbox.css');
    mix.copy(paths.dataTablesBootstrap3Plugin + '/css/datatables-bootstrap3.css', 'resources/css/dataTables-bootstrap3.css');

    // Copy scripts to default resource directory
    mix.copy(paths.jquery + '/jquery.js', 'resources/js/jquery.js');
    mix.copy(paths.bootstrap + '/javascripts/bootstrap.js', 'resources/js/bootstrap.js');
    mix.copy(paths.metisMenu + '/metisMenu.js', 'resources/js/metisMenu.js');
    mix.copy(paths.colorbox + '/jquery.colorbox.js', 'resources/js/jquery.colorbox.js');
    mix.copy(paths.dataTables + '/js/jquery.dataTables.js', 'resources/js/dataTables.js');
    mix.copy(paths.dataTablesBootstrap3Plugin + '/js/datatables-bootstrap3.js', 'resources/js/dataTables-bootstrap3.js');

    // Copy fonts straight to public
    mix.copy(paths.bootstrap + '/fonts/bootstrap/**', 'public/fonts');
    mix.copy(paths.fontawesome + '/fonts/**', 'public/fonts');

    // Copy images straight to public
    mix.copy(paths.colorbox + '/example3/images/**', 'public/img');

    // Compile SASS and output to default resource directory
    mix.sass('app.scss', 'resources/css', {
        includePaths: [
            paths.bootstrap + '/stylesheets/',
            paths.bootswatch + '/',
            paths.fontawesome + '/scss/'
        ]
    });

    // Merge CSSs
    mix.styles([
        'colorbox.css',
        'dataTables-bootstrap.css',
        'metisMenu.css',
        'app.css' // app.css has some overrides
    ]);

    // Merge scripts
    mix.scripts([
        'jquery.js',
        'bootstrap.js',
        'dataTables.js',
        'dataTables-bootstrap3.js',
        'jquery.colorbox.js',
        'metisMenu.js'
    ]);

    // Cache-bust all.css and all.js
    mix.version([
        'public/css/all.css',
        'public/js/all.js'
    ]);
});

