<?php
/**
 * Created by PhpStorm.
 * User: Talisman
 * Date: 25.01.2019
 * Time: 19:50
 */

namespace app\models\validations;


use yii\validators\Validator;

class NotAdminValiadtion extends Validator
{
    public function validateAttribute($model, $attribute)
    {
        if(mb_strtolower($model->$attribute,'utf8')=='admin'){
            $model->addError($attribute,'Запрещено использовать слово admin');
        }
    }
}