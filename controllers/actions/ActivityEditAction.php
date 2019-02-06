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
use yii\web\Response;
use yii\web\UploadedFile;
use yii\web\HttpException;

class ActivityEditAction extends Action
{
    public function run($id){

        $date_format = \Yii::$app->params["date_formats"]["activity_form"];

        if(\Yii::$app->user->isGuest){
            throw new HttpException(401, 'User not auth');
        }

        /** @var ActivityComponent $comp */
        $comp = \Yii::$app->activity;
        /** @var Activity $activity */
        $model = $comp->getModelActivityFromId($id);
        //echo "<pre>"; print_r($model); echo "</pre>";

        if(!\Yii::$app->user->can('authorActivity', ['activity' => $model])){
            throw new HttpException(401, 'Bad permissions');
        }

        if(!\Yii::$app->user->can('viewActivity')){
            throw new HttpException(401, 'Bad permissions');
        }

        if(\Yii::$app->request->isPost){
            $model->load(\Yii::$app->request->post());

            if($comp->updateActivity($model)){
                return $this->controller->redirect(['/activity/view', 'id' => $model->id]);
            }
        }

        if($model->dateStart){
            $date=\DateTime::createFromFormat('Y-m-d H:i:s',$model->dateStart);
            $model->dateStart=$date->format($date_format);
        }
        if($model->dateEnd){
            $date=\DateTime::createFromFormat('Y-m-d H:i:s',$model->dateEnd);
            $model->dateEnd=$date->format($date_format);
        }

        return $this->controller->render('add', ['model' => $model]);
    }
}