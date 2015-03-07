var elixir = require('laravel-elixir');

var bowerPath = './vendor/bower_components';
var paths = {
    'jquery': bowerPath + '/jquery-legacy/dist',
    'bootstrap': bowerPath + '/bootstrap-sass-official/assets',
    'fontawesome': bowerPath + '/font-awesome'
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

    mix.sass('app.scss', 'public/css', {
        includePaths: [
            paths.bootstrap + '/stylesheets/',
            paths.fontawesome + '/scss/'
        ]
    });

    // copy fonts
    mix.copy(paths.bootstrap + '/fonts/bootstrap/**', 'public/fonts');
    mix.copy(paths.fontawesome + '/fonts/**', 'public/fonts');

    // copy scripts
    mix.copy(paths.jquery + '/jquery.js', 'public/js/vendor/jquery.js');
    mix.copy(paths.bootstrap + '/javascripts/bootstrap.js', 'public/js/vendor/bootstrap.js');

    // wasn't able to use scripts or scriptsIn!
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


    mix.version('public/css/app.css');
});

