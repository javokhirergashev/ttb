<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/frontend-files';
    public $css = [
        "css/bootstrap.min.css",
        "css/animate.min.css",
        "css/meanmenu.css",
        "css/fontawesome.min.css",
        "css/flaticon.css",
        "css/nice-select.min.css",
        "css/odometer.min.css",
        "css/magnific-popup.min.css",
        "css/owl.carousel.min.css",
        "css/owl.theme.default.min.css",
        "css/style.css",
        "css/dark.css",
        "css/responsive.css",
        "css/error.css",
        "css/custom.css",
    ];
    public $js = [
//        "js/jquery.min.js",
        "js/bootstrap.bundle.min.js",
        "js/jquery.meanmenu.js",
        "js/jquery.nice-select.min.js",
        "js/odometer.min.js",
        "js/jquery.appear.js",
        "js/datepicker.min.js",
        "js/jquery.magnific-popup.min.js",
        "js/owl.carousel.min.js",
        "js/jquery.ajaxchimp.min.js",
        "js/form-validator.min.js",
        "js/contact-form-script.js",
        "js/main.js",
        "js/custom.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
