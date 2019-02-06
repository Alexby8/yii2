<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 04.02.2019
 * Time: 9:30
 */

namespace app\controllers;


use app\base\BaseController;
use app\models\Users;
use app\components\UsersComponent;

class AuthController extends BaseController
{
    public function actionSignUp(){
        /** @var UsersComponent $comp */
        $comp = \Yii::$app->users_component;

        if(\Yii::$app->request->isPost){
            $model = $comp->getModelUsers(\Yii::$app->request->post());

            $model->setScenario($model::SCENARIO_REGISTRATION);

            if($comp->registration($model)){
                \Yii::$app->session->setFlash('success', 'Создан новый пользователь');
            }else{
                \Yii::$app->session->setFlash('success', 'Не создан!');
            }
        }else{
            $model = $comp->getModelUsers();
        }

        return $this->render('signup', ['model' => $model]);
    }

    public function actionSignIn(){
        /** @var UsersComponent $comp */
        $comp = \Yii::$app->users_component;

        if(\Yii::$app->request->isPost){
            $model = $comp->getModelUsers(\Yii::$app->request->post());

            $model->setScenario($model::SCENARIO_AUTH);

            if($comp->auth($model)){
                \Yii::$app->session->setFlash('success', 'Вы авторизованы');
            }else{
                \Yii::$app->session->setFlash('success', 'Вы не авторизованы');
            }
        }else{
            $model = $comp->getModelUsers();
        }

        return $this->render('signin', ['model' => $model]);
    }
}