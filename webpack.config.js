var Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')
    .cleanupOutputBeforeBuild()
    .autoProvidejQuery()
    .enableSassLoader()
    .enablePostCssLoader()
    .createSharedEntry('js/common', ['jquery', 'moment'])
    .addEntry('js/app', './assets/js/main.js')
    .addEntry('js/custom', './assets/js/custom.js')
    .addStyleEntry('css/main', './assets/scss/main.scss')
    .addStyleEntry('css/custom', './assets/scss/custom.scss')
    .enableVersioning(Encore.isProduction())
    .enableSourceMaps(!Encore.isProduction())
;

module.exports = Encore.getWebpackConfig();
module: {
    noParse: /switchery/
}
