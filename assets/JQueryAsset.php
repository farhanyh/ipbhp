<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author 
 */
class JQueryAsset extends AssetBundle
{
    public $baseUrl = 'http://code.jquery.com';
    public $css = [
    ];
    public $js = [
        'jquery-3.3.1.min.js',
    ];
    public $depends = [
    ];
}
