<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 23.01.2019
 * Time: 21:30
 */

namespace app\controllers\actions;

use app\components\ActivityComponent;
use app\components\base\BaseController;
use yii\base\Action;

class ActivityIndexAction extends Action
{
    public function run(){

        /** @var ActivityComponent $comp */
        $comp = \Yii::$app->activity;
        $activity = $comp->getModelActivity();



        return $this->controller->render('index', ['model' => $activity, 'menu_label' => 'Мой лэйбл']);
    }
}