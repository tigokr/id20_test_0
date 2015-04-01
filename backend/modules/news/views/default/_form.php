<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'publicated_at')->widget(DateTimePicker::className([
        'value'=>!$model->isNewRecord?$model->publicated_at:date('Y-m-d H:i:s'),
    ])); ?>

    <?= $form->field($model, 'title')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>


    <?= $form->field($model, 'subject_id')->widget(Select2::className(), [
        'data'=>ArrayHelper::map(\common\models\Subject::find()->all(), 'id', 'title'),
        'options'=>['id'=>'subject_id-id', 'placeholder'=>'Switch subject...']
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
