<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 04.02.2019
 * Time: 10:14
 */

$form = \yii\bootstrap\ActiveForm::begin(
    [
        'id' => 'auth',
        'method' => 'POST',
    ]
);
?>
    <h2 class="m-b-40">Авторизация</h2>

    <?=$form->field($model, 'email');?>
    <?=$form->field($model, 'password')->passwordInput();?>

    <div class="form-group">
        <button class="btn btn-success" type="submit">Войти</button>
    </div>

<?php
\yii\bootstrap\ActiveForm::end();
?>