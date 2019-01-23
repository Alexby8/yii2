<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 23.01.2019
 * Time: 22:19
 */

namespace app\components;


use yii\base\Component;

class DaysComponent extends Component
{
    public $days_model_class;

    public function getModelDays(){
        return new $this->days_model_class;
    }
}