<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author 
 */
class CoreUIAsset extends AssetBundle
{
    public $sourcePath = '@npm/@coreui';
    public $css = [
        'coreui/dist/css/coreui.min.css',
        'icons/css/coreui-icons.min.css',
    ];
    public $js = [
        'coreui/dist/js/coreui.min.js',
    ];
    public $depends = [
        'app\assets\JQueryAsset',
        'app\assets\PopperAsset',
        'app\assets\BootstrapAsset',
    ];
}
