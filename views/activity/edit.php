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
<h2 class="m-b-40">Редактирование события</h2>

<?=$form->field($model, 'title');?>
<?=$form->field($model, 'description')->textarea();?>
<?=$form->field($model, 'email');?>
<?=$form->field($model, 'date_start');?>
<?=$form->field($model, 'is_repeat')->checkbox();?>
<?=$form->field($model, 'documents[]')->fileInput(['multiple' => 'multiple']);?>

<div class="form-group">
    <button class="btn btn-success" type="submit">Изменить событие</button>
</div>

<?php
\yii\bootstrap\ActiveForm::end();
?>
