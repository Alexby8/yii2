<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 23.01.2019
 * Time: 21:03
 */

namespace app\models;


use app\models\validations\NotAdminValiadtion;
use phpDocumentor\Reflection\Types\Self_;
use yii\base\Model;

class Activity extends Model
{
    public $title;
    public $description;
    public $date_start;
    public $is_repeat;
    public $is_blocked;
    public $email;
    public $documents;

    public function rules()
    {
        return [
            [['title', 'description', 'date_start', 'email'], 'required'],
            [['is_repeat', 'is_blocked'], 'boolean'],
            ['email', 'string', 'min' => 3,'max' => '30'],
            [['title','description','email'],'trim'],
            ['email','email'],
            ['date_start','date','format' => 'php:Y-m-d'],
            ['documents','file','extensions' => ['pdf','png','jpg', 'xls', 'xlsx', 'word'], 'maxFiles' => 20],
        ];
    }

    public function notAdminText($attribute){
         if(mb_strtolower($this->$attribute,'utf8')=='admin'){
             $this->addError($attribute,'Запрещено использовать слово admin');
         }
    }

    public function beforeValidate()
    {
//        if($this->date_start){
//            $date=\DateTime::createFromFormat('d.m.Y',$this->date_start);
//            $this->date_start=$date->format('Y-m-d');
//        }
        return parent::beforeValidate();
    }

    public function attributeLabels()
    {
        return [
            "title" => "Заголовок",
            "description" => "Описание",
            "date_start" => "Дата начала",
            "is_repeat" => "Повторяющееся",
            "is_blocked" => "Блокирующее",
            "email" => "E-mail",
            "documents" => "Документы",
        ];
    }
}