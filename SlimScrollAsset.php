<?php
/**
 * Created by PhpStorm.
 * User: PHPdev
 * Date: 01.07.2015
 * Time: 16:41
 */

namespace kak\widgets\panel;

use yii\web\AssetBundle;

class SlimScrollAsset extends AssetBundle
{
    public $sourcePath = '@bower/slimscroll';
    public $depends = [
        'yii\web\JqueryAsset'
    ];
    public $js = [
        'jquery.slimscroll.min.js'
    ];

    public function init()
    {
        parent::init();
    }
} 