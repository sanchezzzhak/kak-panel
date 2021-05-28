# kak-panel
> this extension is for generating html panel via boostrap 3x+ for Yii2 framework

Install
-----
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require kak/panel "@dev"
```
or add 
```
"kak/panel": "@dev"
```
to the require section of your `composer.json` file.

Usage
-----
```php
<?php
    use kak\widgets\panel\Panel;
?>
<?php Panel::begin([
    'title' =>  ($model->isNewRecord ? 'Create' : ' Update'), // title panel
    'slimOptions' => [], // slim scroll data-attr
    'options' => [], // attr tag panel
    'heading' => true,
])?>
<!-- content -->
<?php Panel::end()?>
```
Or
```php 
<?= Panel::widget([
    'title' => 'title panel',
    'content' => ''
])?>
```
Options
----
