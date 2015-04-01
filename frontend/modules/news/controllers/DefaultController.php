<?php

namespace frontend\modules\news\controllers;

use common\models\News;
use yii\web\HttpException;

class DefaultController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionView($id)
    {
        $model = News::findOne((int)$id);

        if(empty($model))
            throw new HttpException(404, 'Page not found. ');

        return $this->render('view', ['model'=>$model]);
    }

}
