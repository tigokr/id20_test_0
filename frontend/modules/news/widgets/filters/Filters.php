<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 01.04.2015
 * Time: 21:03
 */

namespace frontend\modules\news\widgets\filters;

class Filters extends \yii\bootstrap\Widget {

    public $data = [];

    public function init(){

    }

    public function run(){
        return $this->render('default');
    }

}