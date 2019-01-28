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

class ActivityEditAction extends Action
{
    public function run(){
        /** @var ActivityComponent $comp */
        $comp = \Yii::$app->activity;
        /** @var Activity $activity */
        $activity = $comp->getModelActivity();

        if(\Yii::$app->request->isPost){
            $activity->load(\Yii::$app->request->post());
            if(\Yii::$app->request->isAjax){
                \Yii::$app->response->format=Response::FORMAT_JSON;
                return ActiveForm::validate($activity);
            }

            if($activity->validate()){
                /** @var UploadedFile document */
                $activity->documents = UploadedFile::getInstances($activity, 'documents');

                if(count($activity->documents)){
                    foreach ($activity->documents as $file) {
                        $name = time().mt_rand(0,100);
                        $file->saveAs(\Yii::getAlias('@app/web/upload/'.$name.'.'.$file->getExtension()));
                    }
                }
            }
        }

        return $this->controller->render('edit', ['model' => $activity]);
    }
}