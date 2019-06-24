<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author 
 */
class PopperAsset extends AssetBundle
{
    public $baseUrl = 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd';
    public $css = [
    ];
    public $js = [
        'popper.min.js',
    ];
    public $depends = [
    ];
}
