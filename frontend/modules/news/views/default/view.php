<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\HtmlPurifier;

$this->title = 'News';
$this->params['breadcrumbs'][] = ['label'=>$this->title, 'url'=>\yii\helpers\Url::to(['index'])];
$this->params['breadcrumbs'][] = $model->title;
?>

<div class="col-lg-3">
    <?= frontend\modules\news\widgets\filters\Filters::widget() ?>
</div>

<div class="col-lg-9">
    <h1><?= $model->title; ?> <small><?= \Yii::$app->formatter->asDatetime($model->publicated_at);?></small></h1>

    <?php $model->subject?'<p>'.$model->subject->title.'</p>':''; ?>

    <div class="text">
        <?= HtmlPurifier::process($model->text); ?>
    </div>
</div>