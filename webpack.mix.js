const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
    ]);

mix.combine([
    'node_modules/dropify/dist/js/dropify.min.js',
],'public/js/app.js')

mix.options({
    hmrOptions: {
        host:'sample.test',
        port:'8181',
    },
});

mix.webpackConfig({
    devServer: {
        port: '8079'
    },
});