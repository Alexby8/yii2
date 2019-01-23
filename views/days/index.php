<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 23.01.2019
 * Time: 21:00
 */

$form = \yii\bootstrap\ActiveForm::begin(
    [
        'id' => 'days',
        'method' => 'POST',
    ]
);

?>
<?=$form->field($model, 'date');?>
<?=$form->field($model, 'is_working')->checkbox();?>

<div class="form-group">
    <button class="btn btn-default" type="submit">Отправить</button>
</div>

<?php
\yii\bootstrap\ActiveForm::end();
?>
