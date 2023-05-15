<?php

use Codeception\Test\Unit;

use kak\widgets\panel\Panel;
use yii\web\View;

/**
 * Class PanelTest
 */
class PanelTest extends Unit
{

    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testWidgetBeginEng()
    {
        // mock test view
        $view = new View();
        $view->beginBlock('test');
            Panel::begin([
                'title' => 'title panel',
            ]);
            echo "test content";
            Panel::end();
        $view->endBlock();
        $content = $view->blocks['test'];
        $this->assertNotFalse(
            (bool)preg_match('~<div class="header--title"><h4>title panel</h4>~i', $content)
        );
        $this->assertNotFalse(
            (bool)preg_match('~<div class="panel-body">test content</div>~i', $content)
        );
    }

    public function testWidgetContent()
    {
        // mock test view
        $view = new View();
        $view->beginBlock('test');
        echo Panel::widget([
            'title' => 'title panel',
            'content' => 'test content',
        ]);
        $view->endBlock();
        $content = $view->blocks['test'];
        $this->assertNotFalse(
            (bool)preg_match('~<div class="header--title"><h4>title panel</h4>~i', $content)
        );
        $this->assertNotFalse(
            (bool)preg_match('~<div class="panel-body">test content</div>~i', $content)
        );
    }

    public function testWidgetHeader()
    {
        // mock test view
        $view = new View();
        $view->beginBlock('test');
        echo Panel::widget([
            'title' => 'title panel',
            'content' => 'test content',
            'heading' => false,
        ]);
        $view->endBlock();
        $content = $view->blocks['test'];
        $this->assertFalse(
            (bool)preg_match('~<div class="header--title"><h4>title panel</h4>~i', $content)
        );
        $this->assertNotFalse(
            (bool)preg_match('~<div class="panel-body">test content</div>~i', $content)
        );
    }

    public function testWidgetHeaderIconTags()
    {
        // mock test view
        $view = new View();
        $view->beginBlock('test');
        echo Panel::widget([
            'title' => 'title panel',
            'content' => 'test content',
            'headerIcon' => '<i class="fa-duotone fa-camera-retro"></i>',
        ]);
        $view->endBlock();
        $content = $view->blocks['test'];
        $this->assertNotFalse(
            (bool)preg_match('~<div class="header--title"><h4><i class="fa-duotone fa-camera-retro"></i>title panel</h4>~i', $content)
        );
    }

    public function testWidgetHeaderIconClasses()
    {
        // mock test view
        $view = new View();
        $view->beginBlock('test');
        echo Panel::widget([
            'title' => 'title panel',
            'content' => 'test content',
            'headerIcon' => 'fa-duotone fa-camera-retro',
        ]);
        $view->endBlock();
        $content = $view->blocks['test'];
        $this->assertNotFalse(
            (bool)preg_match('~<div class="header--title"><h4><i class="fa-duotone fa-camera-retro"></i>title panel</h4>~i', $content)
        );
    }

}
