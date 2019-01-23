<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 23.01.2019
 * Time: 21:00
 */

$form = \yii\bootstrap\ActiveForm::begin(
    [
        'id' => 'activity',
        'method' => 'POST',
    ]
);

?>
    <?=$form->field($model, 'title');?>
    <?=$form->field($model, 'description')->textarea();?>

    <div class="form-group">
        <button class="btn btn-default" type="submit">Отправить</button>
    </div>

<?php
\yii\bootstrap\ActiveForm::end();
?>
