<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 01.04.2015
 * Time: 19:30
 */

Yii::setAlias('@db', dirname(__DIR__) . '/db');

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'sqlite:'.Yii::getAlias('@db/db.sqlite'),
];
