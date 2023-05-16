# kak-panel
> this extension is for generating html panel via boostrap 3x+ for Yii2 framework

Install
-----
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run
```
php composer.phar require kak/panel "^1.0"
```
or add 
```
"kak/panel": "^1.0"
```
to the require section of your `composer.json` file.

Usage
-----
```php
<?php

use kak\widgets\panel\Panel;
/**
* @var app\models\Post $model   
* @var yii2\web\View $this 
*/

?>
<?php Panel::begin([
    'title' =>  ($model->isNewRecord ? 'Create' : ' Update'), // title panel
    'slimScroll' => false, // enable slim scroll plugin (default false)
    'slimOptions' => [], // slim scroll options for data-attr
    'options' => [
        'class' => Panel::CSS_CLASS_WARNING
    ], // attr tag panel
    'heading' => true,  // show/hide header title (default true)
    'headerColumn' => 'string content', // additional column on the right position for header
    'headerIcon' => 'string classes or html tag content',  
    'headerTag' => 'h4',
    'header' => 'header string',
    'footer' => 'footer string',
    'bodyOptions' => [], // the HTML attributes for the body-panel tag.
    'templateHeader' => '<div class="header--title">{title} {header}</div><div class="header--columns">{columns}</div>',
    
])?>
<!-- content -->
<?php Panel::end()?>
```
Or

```php 

<?= Panel::widget([
    'title' => 'title panel',
    'content' => 'html content'
])?>

```
