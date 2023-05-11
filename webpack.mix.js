let mix = require('laravel-mix');

/**
 * common.css
 * 'public/css/common'
*/
mix.babel([
    'resources/css/common/reset.scss',
    'resources/css/common/common.scss',
], 'public/css/common/common.css');

/**
 * bootstrap.css
 * 'public/css/plugin/bootstrap'
 */
mix.babel([
    'resources/css/plugin/bootstrap/bootstrap.css',
], 'public/css/plugin/bootstrap/bootstrap.css');

/**
 * style.default.min.css
 * 'public/css/plugin/bootstrap'
 */
mix.babel([
    'resources/css/plugin/bootstrap/style.default.min.css',
], 'public/css/plugin/bootstrap/style.default.min.css');

/**
 * style.css
 * 'public/css'
 */
mix.styles(
    'resources/css/pages/*.scss',
'public/css/style.css');

/**
 * bootstrap.bundle.js
 * 'public/js/plugin/bootstrap/'
 */
mix.copy([
    'resources/js/plugin/bootstrap/bootstrap.bundle.min.js',
], 'public/js/plugin/bootstrap/bootstrap.bundle.min.js');

/**
 * theme.js
 * 'public/js/plugin/bootstrap/'
 */
mix.copy([
    'resources/js/plugin/bootstrap/theme.js',
], 'public/js/plugin/bootstrap/theme.js');


mix.babel([
    'resources/js/common.js',
], 'public/js/common.js');
