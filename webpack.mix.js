let mix = require('laravel-mix');

// JS
mix.js('resources/assets/js/app.js', 'public/js')

// CSS
mix.sass(['resources/assets/sass/app.scss', 'resources/assets/sass/_variables.scss'], 'public/css');
