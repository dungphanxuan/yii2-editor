<?php

namespace dungphanxuan\yii2editor;

use yii\web\AssetBundle;

class MarkDownEditorAsset extends AssetBundle
{
    public $sourcePath = '@dungphanxuan/yii2editor/assets';
    public $js = [
        'js/bootstrap-markdown.js',
    ];
    public $css = [
        'css/bootstrap-markdown.min.css',
    ];
    public $depends = [
        '\yii\bootstrap\BootstrapAsset'
    ];

}
