<?php

Yii::setAlias('@tests', __DIR__ . '/../');

return [
    'id' => 'test-kak-panel',
    'class' => 'yii\console\Application',
    'basePath' => \Yii::getAlias('@tests/_output'),
    'runtimePath' => \Yii::getAlias('@tests/_output'),
    'bootstrap' => [],
    'components' => [
    ],
    'aliases' => [
        '@webroot' => __DIR__ . '/../_output',
        '@web' => __DIR__ . '/../_output',
        '@tests' => __DIR__ . '/../_output',
        '@bower' => __DIR__ . '/../../vendor/bower-asset',
        '@npm' => __DIR__ . '/../../vendor/npm-asset',
    ]
];
