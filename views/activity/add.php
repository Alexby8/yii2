<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 23.01.2019
 * Time: 21:00
 * @var $this \yii\web\View
 */
use app\assets\DatetimepickerAsset;
DatetimepickerAsset::register($this);

$form = \yii\bootstrap\ActiveForm::begin(
    [
        'id' => 'activity',
        'method' => 'POST'
    ]
);

?>
    <?php if($model->isNewRecord){ ?>
    <h2 class="m-b-40">Добавление события</h2>
    <?php }else{ ?>
    <h2 class="m-b-40">Редактирование события</h2>
    <?php } ?>

    <?=$form->field($model, 'title');?>
    <?=$form->field($model, 'description')->textarea();?>
    <div class="p-r"><?=$form->field($model, 'dateStart');?></div>
    <div class="p-r"><?=$form->field($model, 'dateEnd');?></div>
    <?=$form->field($model, 'isBlocking')->checkbox();?>
    <?=$form->field($model, 'isRepeatable')->checkbox();?>

    <div class="form-group">
        <?php if($model->isNewRecord){ ?>
            <button class="btn btn-success" type="submit">Создать событие</button>
        <?php }else{ ?>
            <button class="btn btn-success" type="submit">Изменить событие</button>
        <?php } ?>
    </div>

<?php
\yii\bootstrap\ActiveForm::end();
?>

<script type="text/javascript">
    $(function () {
        $('#activity-datestart').datetimepicker({
            locale: 'ru',
        });
        $('#activity-dateend').datetimepicker({
            locale: 'ru',
        });
        $("#activity-datestart").on("dp.change", function (e) {
            $('#activity-dateend').data("DateTimePicker").minDate(e.date);
        });
        $("#activity-dateend").on("dp.change", function (e) {
            $('#activity-datestart').data("DateTimePicker").maxDate(e.date);
        });
    });
</script>