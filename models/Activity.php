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
    public $email_repeat;
    public $count;
    public $document;

    const SCENARIO_CUSTUM='my_scenario';

    public function scenarios()
    {
        return array_merge([
                self::SCENARIO_CUSTUM=>['title','description'],
            ]
            ,parent::scenarios());
    }

    public function rules()
    {
        return [
            [['title'], 'required','on'=>self::SCENARIO_CUSTUM],
//            [['is_repeat', 'is_blocked'], 'boolean'],
//            ['email', 'string', 'min' => 3,'max' => '30'],
//            [['title','description','email'],'trim'],
//            ['email','email'],
//            ['email_repeat','compare','compareAttribute' => 'email'],
//            ['email','required','when' => function($model){
//                return $model->is_repeat==1;
//            }],
//            ['is_repeat','in','range' => [0,1,2,3]],
//            ['date_start','date','format' => 'php:Y-m-d'],
//            ['title',NotAdminValiadtion::class],
//            ['title','match','pattern' => '/[a-zа-яА-ЯA-Z]{1,}/','message' => 'Только буквы'],
            ['document','file','extensions' => ['pdf','png','jpg']],
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
            "title" => "Заголовок активности",
            "description" => "Описание события",
            "date_start" => "Дата начала",
            "is_repeat" => "Повторяющееся",
            "is_blocked" => "Блокирующее",
        ];
    }
}