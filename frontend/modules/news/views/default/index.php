<?php
/* @var $this yii\web\View */
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;

$this->title = 'News';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-lg-3">
    <?= frontend\modules\news\widgets\filters\Filters::widget() ?>
</div>

<div class="col-lg-9">
    <?=ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_news',
    ]); ?>
</div>