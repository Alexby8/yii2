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
use yii\web\HttpException;

class ActivityViewAction extends Action
{
    public function run($id){

        if(\Yii::$app->user->isGuest){
            throw new HttpException(401, 'User not auth');
        }

        /** @var ActivityComponent $comp */
        $comp = \Yii::$app->activity;
        /** @var Activity $activity */

        $model = $comp->getModelActivityFromId($id);

        if(!\Yii::$app->user->can('authorActivity', ['activity' => $model])){
            throw new HttpException(401, 'Bad permissions');
        }

        if(!\Yii::$app->user->can('viewActivity')){
            throw new HttpException(401, 'Bad permissions');
        }

        return $this->controller->render('view', ['model' => $model]);
    }
}