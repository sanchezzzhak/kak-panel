<?php
namespace kak\widgets\panel;
use yii\web\AssetBundle;

class PanelAsset extends AssetBundle
{
    public $depends = [
        'yii\web\JqueryAsset'
    ];

    public $js = [
        'panel.js'
    ];
    
    public $css = [
        'panel.css'
    ];

    public function init()
    {
        $this->sourcePath  = __DIR__ . '/assets';
        parent::init();
    }

} 