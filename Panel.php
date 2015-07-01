<?php

namespace kak\widgets\panel;

use yii\bootstrap\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\Json;


class Panel extends Widget
{
    /**
     * @var array the HTML attributes for the widget container tag.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $options = [];


   /* public $layout;
    public $buttons;*/


    /** @var  string the panel-title */
    public $title;
    public $height;
    public $content;

    public function init()
    {
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
        if (!isset($this->options['class'])) {
            $this->options['class'] = 'panel panel-inverse';
        }

        echo Html::beginTag('div',$this->options);
        echo Html::beginTag('div',['class' => 'panel-heading']);
        echo Html::tag('h4',$this->title);
        echo Html::beginTag('div',['class' => 'panel-body']);
        echo $this->content;
    }

    public function run()
    {
        echo Html::endTag('div');
        echo Html::endTag('div');
        echo Html::endTag('div');
    }

}