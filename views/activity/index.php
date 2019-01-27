<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 23.01.2019
 * Time: 21:00
 * @var $this \yii\web\View
 */

$form = \yii\bootstrap\ActiveForm::begin(
    [
        'id' => 'activity',
        'method' => 'POST',
        'enableAjaxValidation' => true,
    ]
);

?>
    <?=$form->field($model, 'title');?>
    <?=$form->field($model, 'description')->textarea();?>
    <?=$form->field($model,'email',[
            'enableAjaxValidation'=>true,
            'enableClientValidation'=>false]);?>
    <?=$form->field($model,'email_repeat');?>
    <?=$form->field($model,'date_start');?>
    <?=$form->field($model,'is_repeat')->checkbox();?>
    <?=$form->field($model,'document')->fileInput();?>

    <div class="form-group">
        <button class="btn btn-default" type="submit">Отправить</button>
    </div>

<?php
\yii\bootstrap\ActiveForm::end();
?>
