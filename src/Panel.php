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
    /** @var string additional column html */
    public $headerColumn = '';
    /** @var string icon + title wrap to tag */
    public $headerTag = 'h4';
    /** @var string template for header */
    public $templateHeader = '<div class="header--title">{title} {header}</div><div class="header--columns">{columns}</div>';

    /**
     * begin wrap content
     */
    public function init()
    {
        $this->initOptions();
        echo Html::beginTag('div', $this->options);
        if ($this->heading) {
            echo $this->renderHeader();
        }
        echo Html::beginTag('div', $this->bodyOptions);
        echo $this->content;
    }

    protected function renderHeader(): string
    {
        return Html::tag('div',
            strtr($this->templateHeader, [
                '{icon}' => $this->renderHeaderIcon(),
                '{title}' => Html::tag($this->headerTag, $this->renderHeaderIcon() . $this->title),
                '{header}' => $this->header,
                '{columns}' => $this->headerColumn,
            ]));
    }

    /**
     * end wrap content
     */
    public function run()
    {
        echo Html::endTag('div');
        if (!empty($this->footer)) {
            echo Html::tag('div', $this->footer, ['class' => self::CSS_CLASS_FOOTER]);
        }
        echo Html::endTag('div');
    }

    /**
     * render icon or html tag icon
     * @return string
     */
    protected function renderHeaderIcon(): string
    {
        $hasWrapTag = strpos($this->headerIcon, '<') === false;
        if ($hasWrapTag && $this->headerIcon !== '') {
            return Html::tag('i', '', ['class' => $this->headerIcon]);
        }
        return $this->headerIcon;
    }

    protected function appendPrefixOptions($attrName, $options = []): array
    {
        $strArr = [];
        foreach ($options as $key => $option) {
            $strArr["{$attrName}-{$key}"] = $option;
        }
        return $strArr;
    }

    /**
     * init base options
     */
    protected function initOptions(): void
    {
        $view = $this->getView();

        Html::addCssClass($this->bodyOptions, self::CSS_CLASS_BODY);

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