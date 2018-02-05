let mix = require('laravel-mix');

var node_modules = 'node_modules/';
var bootstrap = 'bootstrap/dist/';
var resources = 'resources/assets/'

// JS
mix.js(resources + 'js/admin/app.js', 'public/js/admin.js')
mix.copy(node_modules + bootstrap + 'js/bootstrap.min.js', 'public/js/bootstrap.js');

// CSS
mix.sass(resources + 'sass/admin/app.scss', 'public/css/admin.css');
mix.sass(resources + 'sass/pages/app.scss', 'public/css/global.css');

// Third Party
mix.copy(node_modules + bootstrap + 'css/bootstrap.min.css', 'public/css/package/bootstrap.css');
mix.copy(node_modules + 'font-awesome/css/font-awesome.min.css', 'public/css/package/font-awesome.css');
mix.copy(node_modules + 'font-awesome/fonts', 'public/css/fonts');
