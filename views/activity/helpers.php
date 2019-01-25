<?php

/**
 * Created by PhpStorm.
 * User: Talisman
 * Date: 25.01.2019
 * Time: 20:31
 */

/* @var $this \yii\web\View */
/* @var $val array */
use yii\helpers\Html;
?>

<?=Html::dropDownList('list',1,$val);?>
<?=Html::activeTextInput($model,'title');?>
<?=Html::getInputName($model,'title')?>
<?=Html::a('test','#')?>
<?=Html::tag('span','содержимое',['style'=>'color:green;']);?>
<?=Html::beginTag('div');?>
text
<?=Html::endTag('div')?>
