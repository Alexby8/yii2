<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 23.01.2019
 * Time: 22:20
 */

namespace app\controllers\actions;

use app\components\DaysComponent;
use yii\base\Action;

class DaysIndexAction extends Action
{
    public function run(){

        /** @var DaysComponent $comp */
        $comp = \Yii::$app->days;
        $days = $comp->getModelDays();

        return $this->controller->render('index', ['model' => $days]);
    }
}