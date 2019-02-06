<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 23.01.2019
 * Time: 21:03
 */

namespace app\models;


class Activity extends ActivityBase
{
    public function rules()
    {
        return array_merge([
            [['isRepeatable', 'isBlocking'], 'boolean'],
            [['title','description'],'trim'],
        ], parent::rules());
    }

    public function notAdminText($attribute){
         if(mb_strtolower($this->$attribute,'utf8')=='admin'){
             $this->addError($attribute,'Запрещено использовать слово admin');
         }
    }

    public function beforeValidate()
    {
        $date_format = \Yii::$app->params["date_formats"]["activity_form"];

        if($this->dateStart){
            $date=\DateTime::createFromFormat($date_format,$this->dateStart);
            if(!$date){
                return parent::beforeValidate();
            }
            $this->dateStart=$date->format('Y-m-d H:i:s');
        }

        if($this->dateEnd){
            $date=\DateTime::createFromFormat($date_format,$this->dateEnd);
            if(!$date){
                return parent::beforeValidate();
            }
            $this->dateEnd=$date->format('Y-m-d H:i:s');

            if(strtotime($this->dateEnd) < strtotime($this->dateStart)){
                $this->dateEnd = $this->dateStart;
            }
        }else{
            $this->dateEnd = $this->dateStart;
        }

        return parent::beforeValidate();
    }

    public function attributeLabels()
    {
        return [
            "title" => "Заголовок",
            "description" => "Описание",
            "dateStart" => "Дата начала",
            "dateEnd" => "Дата окончания",
            "isRepeatable" => "Повторяющееся",
            "isBlocking" => "Блокирующее",
        ];
    }
}