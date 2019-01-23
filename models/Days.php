<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 23.01.2019
 * Time: 21:39
 */

namespace app\models;


use yii\base\Model;

class Days extends Model
{
    public $date;
    public $is_working;
    public $activities;

    public function rules()
    {
        return [
            ['is_working', 'boolean'],
            ['date', 'required']
        ];
    }

    public function attributeLabels()
    {
        return [
            "date" => "Дата",
            "is_working" => "Рабочий день",
            "activities" => "Привязанные активности",
        ];
    }
}