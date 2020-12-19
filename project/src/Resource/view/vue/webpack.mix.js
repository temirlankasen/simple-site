const path = require('path');
const mix = require('laravel-mix');

const staticDir = '../../../../static';
// const staticDir = './static';

const webpackOptions = {}

if (!mix.inProduction()) {
    webpackOptions.devtool = 'inline-source-map';
}

mix.webpackConfig(webpackOptions)

mix.disableSuccessNotifications().options({
    processCssUrls: false,
});

mix
    .setPublicPath(staticDir)
    .js('./components/home/main.js', staticDir + '/vuejs/home/app.js')

mix.version();
