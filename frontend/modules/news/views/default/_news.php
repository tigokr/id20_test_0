<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 01.04.2015
 * Time: 20:43
 */

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>


<div class="news">
    <h2><?= Html::encode($model->title) ?> <small><?=\Yii::$app->formatter->asDatetime($model->publicated_at); ?></small></h2>
    <div>
        <?= \yii\helpers\StringHelper::truncate(HtmlPurifier::process($model->text), 255, '&hellip;') ?>
    </div>
    <?= \yii\helpers\Html::a('Read more &hellip;', \yii\helpers\Url::to(['default/view', 'id'=>$model->id])); ?>
</div>
