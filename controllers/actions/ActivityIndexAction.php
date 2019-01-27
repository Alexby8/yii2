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
use app\models\Activity;
use yii\base\Action;
use yii\bootstrap\ActiveForm;
use yii\web\Response;
use yii\web\UploadedFile;


class ActivityIndexAction extends Action
{
    public function run(){

        /** @var ActivityComponent $comp */
        $comp = \Yii::$app->activity;
        /** @var Activity $activity */
        $activity = $comp->getModelActivity();
        $activity->setScenario($activity::SCENARIO_CUSTUM);
        if(\Yii::$app->request->isPost){
            $activity->load(\Yii::$app->request->post());
            if(\Yii::$app->request->isAjax){
                \Yii::$app->response->format=Response::FORMAT_JSON;
                return ActiveForm::validate($activity);
            }

            if($activity->validate()){
                /** @var UploadedFile document */
                $activity->document=UploadedFile::getInstance($activity,'document');
                $activity->document->saveAs(\Yii::getAlias('@app/files/'.mt_rand(0,100).'.'.$activity->document->getExtension()));

            }
        }
        return $this->controller->render('index', ['model' => $activity, 'menu_label' => 'Мой лэйбл']);
    }
}