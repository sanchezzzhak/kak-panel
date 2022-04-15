<?php
namespace kak\widgets\panel;
use yii\web\AssetBundle;

class PanelAsset extends AssetBundle
{
    public $sourcePath = '@vendor/kak/panel/src/assets';
    
    public $depends = [
        'yii\web\JqueryAsset'
    ];

    public $js = [
        'panel.js'
    ];
    
    public $css = [
        'panel.css'
    ];

} 