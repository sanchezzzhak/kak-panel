# kak-panel
Yii widget bootstrap panel + sortable panel
=====================


The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist kak/panel "*"
```

or add

```
"kak/panel": "*"
```

to the require section of your `composer.json` file.


Usage
-----
```php
<?php kak\widgets\panel\Panel::begin([
    'title' =>  ($model->isNewRecord ? 'Create' : ' Update'), // title panel
    'height' => 300, // 300px                                 // is set height then init SlimScroll
    'heading' => true,                                        // show/hide title 
])?>
<!-- content -->
<?php kak\widgets\panel\Panel::end();?>
```
Or
```php 
<?=kak\widgets\panel\Panel::widget([
    'title' => 'title panel',
    'content' => ''
]);?>
```
