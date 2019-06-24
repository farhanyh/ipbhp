<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author 
 */
class BootstrapAsset extends AssetBundle
{
    public $baseUrl = 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js';
    public $css = [
    ];
    public $js = [
        'bootstrap.min.js',
    ];
    public $depends = [
    ];
}
