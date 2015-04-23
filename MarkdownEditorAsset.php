<?php

namespace dungphanxuan\yii2editor;

use yii\web\AssetBundle;

class MarkDownEditorAsset extends AssetBundle
{
    public $sourcePath = '@dungphanxuan/yii2editor/assets';
    public $js = [
        'js/markdown.js',
        'js/bootstrap-markdown.js',
        'locale/bootstrap-markdown.vi.js',
        'locale/bootstrap-markdown.ja.js',
        'js/jquery.hotkeys.js',
    ];
    public $css = [
        'css/bootstrap-markdown.min.css',
    ];
    public $depends = [
        '\yii\bootstrap\BootstrapAsset',
        '\yii\bootstrap\BootstrapPluginAsset',
    ];

}
