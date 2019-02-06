<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 27.01.2019
 * Time: 15:49
 */

namespace app\controllers\actions;

use app\models\Activity;
use yii\base\Action;
use app\components\ActivityComponent;
use yii\bootstrap\ActiveForm;
use yii\web\HttpException;
use yii\web\Response;
use yii\web\UploadedFile;

class ActivityAddAction extends Action
{
    public function run(){

        if(\Yii::$app->user->isGuest){
            throw new HttpException(401, 'User not auth');
        }

        if(!\Yii::$app->user->can('createActivity')){
            throw new HttpException(401, 'Bad permissions');
        }

        /** @var ActivityComponent $comp */
        $comp = \Yii::$app->activity;
        /** @var Activity $model */

        if(\Yii::$app->request->isPost){
            $model = $comp->getModelActivity(\Yii::$app->request->post());

            if($comp->addActivity($model)){
                return $this->controller->redirect(['/activity/view', 'id' => $model->id]);
            }
        }else{
            $model = $comp->getModelActivity();
        }

        return $this->controller->render('add', ['model' => $model]);
    }
}