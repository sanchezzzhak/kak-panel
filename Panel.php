<?php

namespace kak\widgets\panel;

use yii\bootstrap\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * Class Panel
 * @package kak\widgets\panel
 */
class Panel extends Widget
{
    const CSS_CLASS_HEADER = 'panel-heading';
    const CSS_CLASS_BODY = 'panel-body';
    const CSS_CLASS_FOOTER = 'panel-footer';

    const CSS_CLASS_INVERSE = 'panel-inverse';
    const CSS_CLASS_DEFAULT = 'panel-default';
    const CSS_CLASS_PRIMARY = 'panel-primary';
    const CSS_CLASS_SUCCESS = 'panel-success';
    const CSS_CLASS_INFO = 'panel-info';
    const CSS_CLASS_WARNING = 'panel-warning';
    const CSS_CLASS_DANGER = 'panel-danger';

    /**
     * @var array the HTML attributes for the widget container tag.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $options = [];
    /*** @var array the HTML attributes for the body-panel tag. */
    public $bodyOptions = [];
    /** @var string the panel-title */
    public $title;
    /** @var bool show/hide header title */
    public $heading = true;
    /** @var string body panel */
    public $content;
    /** @var string header panel */
    public $header;
    /** @var string header icon */
    public $headerIcon = '';
    /** @var string footer panel */
    public $footer;
    /** @var bool is use slimScroll */
    public $slimScroll = false;
    /** @var array the slimScroll HTML attributes */
    public $slimOptions = [];

    public $headerColumn = '{menu}';

    public function init()
    {
        $this->initOptions();

        echo Html::beginTag('div', $this->options);
        if ($this->heading) {
            echo Html::tag('div',
                sprintf(
                    '<div class="header--title">%s %s %s</div><div class="header--columns">%s</div>',
                    $this->renderHeaderIcon(),
                    Html::tag('h4', $this->title),
                    $this->header,
                    $this->renderColumn()
                ), [
                    'class' => self::CSS_CLASS_HEADER
                ]);
        }

        Html::addCssClass($this->bodyOptions, self::CSS_CLASS_BODY);
        echo Html::beginTag('div', $this->bodyOptions);
        echo $this->content;
    }

    public function run()
    {
        echo Html::endTag('div');
        if (!empty($this->footer)) {
            echo Html::tag('div', $this->footer, ['class' => self::CSS_CLASS_FOOTER]);
        }

        echo Html::endTag('div');
    }

    protected function renderHeaderIcon()
    {
        $hasWrapTag = strpos($this->headerIcon, '<') === false;
        if ($hasWrapTag) {
            return Html::tag('i', '', ['class' => $this->headerIcon]);
        }
        return $this->headerIcon;
    }


    protected function renderMenuHamburger() {
        return
            Html::tag('button', '<i class="glyphicon glyphicon-align-justify"></i>', [
               'class' => 'btn btn-back btn-xs'
            ]);
    }

    protected function renderMenu() {
        return $this->renderMenuHamburger();
    }


    protected function renderColumn()
    {
        return strtr($this->headerColumn, [
            '{menu}' => $this->renderMenu(),
        ]);
    }

    protected function appendPrefixOptions($attrName, $options = [])
    {
        $strArr = [];
        foreach ($options as $key => $option) {
            $strArr["{$attrName}-{$key}"] = $option;
        }
        return $strArr;
    }

    private function initOptions()
    {
        $view = $this->getView();

        if ($this->slimScroll) {
            $this->bodyOptions = ArrayHelper::merge(
                $this->bodyOptions,
                $this->appendPrefixOptions('data-slim', $this->slimOptions)
            );
            Html::addCssClass($this->bodyOptions, 'slimScrollPanel');
            SlimScrollAsset::register($view);
        }

        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }

        if (!isset($this->options['class'])) {
            $this->options['class'] = self::CSS_CLASS_INVERSE;
        }

        Html::addCssClass($this->options, 'panel kak-panel');
        PanelAsset::register($view);
    }

}