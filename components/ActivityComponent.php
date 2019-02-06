<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 23.01.2019
 * Time: 22:03
 */

namespace app\components;


use app\models\Activity;
use yii\base\Component;

class ActivityComponent extends Component
{
    public $activity_model_class;

    public function getModelActivity($params = []){
        $model = new $this->activity_model_class;

        if(!empty($params)){
            $model->load($params);
        }

        return $model;
    }

    public function getModelActivityFromId($id){
        return Activity::find()->andWhere(['id' => $id])->one();
    }

    public function addActivity($model){
        $model->user_id = \Yii::$app->user->getIdentity()->id;

        if($model->save()){
            return true;
        }

        return false;
    }

    public function updateActivity(&$model){
        $model->user_id = \Yii::$app->user->getIdentity()->id;

        if($model->update()){
            return true;
        }

        return false;
    }
}