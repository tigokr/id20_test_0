<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 01.04.2015
 * Time: 21:07
 */

use \yii\helpers\Html;
use \yii\helpers\Url;

$data = $this->context->data;

//\yii\helpers\VarDumper::dump($data,6,1);die;
?>

<?php if(!empty($data)): ?>
<ul>
    <?php foreach($data as $y=>$list): ?>
    <li>
        <b><?=Html::a($y.' ('.$list['count'].')', Url::to(['', 'year'=>$y])); ?></b>
        <?php if(isset($list['subjects']) && !empty($list['subjects'])): ?>
            <p>
                <?php foreach($list['subjects'] as $subject_id=>$subject): ?>
                    <span><?=Html::a($subject['title'].' ('.$subject['count'].')', Url::to(['default/index', 'year'=>$y, 'subject_id'=>$subject_id])); ?></span>
                <?php endforeach; ?>
            </p>
        <?php endif; ?>
        <?php if(isset($list['months']) && !empty($list['months'])): ?>
        <ul>
            <?php foreach($list['months'] as $month_num=>$count): ?>
            <li><?=Html::a($month_num.' ('.$count.')', Url::to(['default/index', 'year'=>$y, 'month'=>$month_num])); ?></li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
    </li>

    <?php endforeach; ?>
</ul>
<?php endif; ?>
