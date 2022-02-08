const mix = require('laravel-mix')

mix.setPublicPath('dist');
mix.js('resources/js/tool.js', 'js').vue({ version: 2 });
mix.js('resources/js/theme.js', 'js');
mix.sass('resources/sass/tool.scss', 'css');

// version not needed
/*if (mix.inProduction()) {
    mix.version();
}*/
