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
 * 'public/css'
 */
mix.styles(
    'resources/css/pages/*.scss',
'public/css/style.css');

