<?php

namespace frontend\modules\news\controllers;

use common\models\News;
use yii\helpers\VarDumper;
use yii\web\HttpException;
use yii\data\ActiveDataProvider;

class DefaultController extends \yii\web\Controller
{
    public function actionIndex($year = null, $month = null, $subject_id = null)
    {

        $where = [];
        if(!empty($year) && empty($month)) {
            $where = $where + ["strftime('%Y', `publicated_at`, 'unixepoch', 'localtime' )"=>$year];
        }
        if(!empty($year) && !empty($month)) {
            $where = $where + ["strftime('%Y-%m', `publicated_at`, 'unixepoch', 'localtime' )"=>$year.'-'.$month];
        }
        if(!empty($subject_id)) {
            $where = $where + ["subject_id"=>(int)$subject_id];
        }
//VarDumper::dump($where,5,1);die;
        $dataProvider = new ActiveDataProvider([
            'query' => \common\models\News::find()->where($where),
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionView($id)
    {
        $model = News::findOne((int)$id);

        if(empty($model))
            throw new HttpException(404, 'Page not found. ');

        return $this->render('view', ['model'=>$model]);
    }

}
