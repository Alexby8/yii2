<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 23.01.2019
 * Time: 21:03
 */

namespace app\models;


use yii\base\Model;

class Activity extends Model
{
    public $title;
    public $description;
    public $date_start;
    public $is_repeat;
    public $is_blocked;
    public $email;

    public function rules()
    {
        return [
            [['title', 'description', 'date_start'], 'required'],
            [['is_repeat', 'is_blocked'], 'boolean'],
            ['email', 'string', 'min' => 3],
        ];
    }

    public function attributeLabels()
    {
        return [
            "title" => "Заголовок активности",
            "description" => "Описание события",
            "date_start" => "Дата начала",
            "is_repeat" => "Повторяющееся",
            "is_blocked" => "Блокирующее",
        ];
    }
}