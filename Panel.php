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
    public $bodyOptions = [];

   /* public $layout;
    public $buttons;*/


    /** @var  string the panel-title */
    public $title;
    public $heading = true;

    public $content;
    public $header;
    public $footer;

    public $slimScroll = false;
    public $slimOptions = [];


    public function init()
    {
        $this->initOptions();

        echo Html::beginTag('div',$this->options);

        if($this->heading)
            echo Html::tag('div', Html::tag('h4',$this->title) . $this->header , ['class' => 'panel-heading']);

        Html::addCssClass($this->bodyOptions,'panel-body');
        echo Html::beginTag('div',$this->bodyOptions);
        echo $this->content;
    }

    protected function prepareOptionsToAttr($attrName,$options= [])
    {
        $strArr = [];
        foreach($options as $key => $option) {
            $strArr[$attrName . '-'.$key] =  $option;
        }
        return $strArr;
    }

    public function run()
    {
        echo Html::endTag('div');

        if(!empty($this->footer)){
            echo  Html::tag('div', $this->footer , ['class' => 'panel-footer']);
        }
        echo Html::endTag('div');
    }


    private function initOptions()
    {
        $view = $this->getView();
        if($this->slimScroll) {
            $this->bodyOptions = ArrayHelper::merge($this->bodyOptions, $this->prepareOptionsToAttr('data-slim',$this->slimOptions));
            Html::addCssClass($this->bodyOptions,'slimScrollPanel');
            SlimScrollAsset::register($view);
        }
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }

        if (!isset($this->options['class'])) {
            $this->options['class'] = 'panel-inverse';
        }
        Html::addCssClass($this->options,'panel kak-panel');
        PanelAsset::register($view);
    }

}