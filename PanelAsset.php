<?php
namespace kak\widgets\panel;
use yii\web\AssetBundle;

class PanelAsset extends AssetBundle
{
    public $depends = [
        'yii\web\JqueryAsset'
    ];

    public $js = [
        'kak-panel.js'
    ];

    public $sourcePath = '@kak/widgets/panel/assets';
} 