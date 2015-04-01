<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 01.04.2015
 * Time: 21:03
 */

namespace frontend\modules\news\widgets\filters;

use common\models\News;
use common\models\Subject;
use yii\db\Query;
use yii\helpers\VarDumper;

class Filters extends \yii\bootstrap\Widget {

    public $data = [];

    public function init(){

        $query = new Query();
        $query->select(['ym'=>"strftime('%Y-%m', `publicated_at`, 'unixepoch', 'localtime' )"])
            ->from(News::tableName())
            ->distinct(1);

        $ym = $query->all();

        $query = new Query();
        $query->select(['y'=>"strftime('%Y', `publicated_at`, 'unixepoch', 'localtime' )", 'subject_id'=>'subjects.id'])
            ->from('news')
            ->leftJoin('subjects', 'subjects.id=news.subject_id')
            ->where('subjects.id is not null')
            ->distinct(true)
            ->all();
        $subj = $query->all();

        $dates = [];

        foreach($ym as $t) {
            list($year, $month) = explode('-', $t['ym']);
            $dates[$year]['count'] = (int)News::find()->where(["strftime('%Y', `publicated_at`, 'unixepoch', 'localtime')"=>$year])->count();

            $dates[$year]['months'][$month] = (int)News::find()->where(["strftime('%Y-%m', `publicated_at`, 'unixepoch', 'localtime')"=>$t['ym']])->count();
        }

        $subjects = [];

        foreach ($subj as $t) {
            $dates[$t['y']]['subjects'][$t['subject_id']] = [
                'title'=>Subject::findOne($t['subject_id'])->title,
                'count'=>News::find()->where(['subject_id'=>$t['subject_id'], "strftime('%Y', `publicated_at`, 'unixepoch', 'localtime')"=>$t['y']])->count(),
            ];
        }

        $this->data = $dates;
    }

    public function run(){
        return $this->render('default');
    }

}