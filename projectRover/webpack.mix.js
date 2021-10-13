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

const path = require('path');

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]).vue();

mix.webpackConfig({
        modules: {
            rules:[
                {
                    test: path.resolve(__dirname, 'vector'),
                    exclude: [ 

                        path.join(__dirname,'vector/dist/elements/svg'),
                    ]
                  }
           ]
        }
});