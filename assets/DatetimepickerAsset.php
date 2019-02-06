<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 05.02.2019
 * Time: 23:04
 */

namespace app\assets;

use yii\web\AssetBundle;


class DatetimepickerAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css',
    ];
    public $js = [
        'vendor/bootstrap-datetimepicker/moment.min.js',
        'vendor/bootstrap-datetimepicker/ru.js',
        'vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}