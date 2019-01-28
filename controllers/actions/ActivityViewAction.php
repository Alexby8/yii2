<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 27.01.2019
 * Time: 15:29
 */

namespace app\controllers\actions;

use app\models\Activity;
use yii\base\Action;
use app\components\ActivityComponent;

class ActivityViewAction extends Action
{
    public function run(){
        /** @var ActivityComponent $comp */
        $comp = \Yii::$app->activity;
        /** @var Activity $activity */
        $activity = $comp->getModelActivity();

        return $this->controller->render('view', ['model' => $activity]);
    }
}