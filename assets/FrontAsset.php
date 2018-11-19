<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;
use Yii;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class FrontAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $js = [
        'js/front/main.min.js',
        'js/front/location.js',
        // TODO передать ключ параметром
        'https://maps.googleapis.com/maps/api/js?key=AIzaSyA1K2I3aWBkvWkzriMdNeJkBFDi318pPaw&callback=initMap',
    ];
    public $css = [
        // more plugin CSS here
        'css/front/main.css',
        //'fonts/pomidoro-icon/styles.css',
        'fonts/pomidoro-main/styles.css'
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'rmrevin\yii\fontawesome\AssetBundle',
        'yii\bootstrap\BootstrapPluginAsset',

        //'yii\web\YiiAsset',
    ];
}
