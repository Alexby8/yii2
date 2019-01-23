<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 23.01.2019
 * Time: 22:03
 */

namespace app\components;


use yii\base\Component;

class ActivityComponent extends Component
{
    public $activity_model_class;

    public function getModelActivity(){
        return new $this->activity_model_class;
    }
}