<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 04.02.2019
 * Time: 18:24
 */

namespace app\components;


use app\models\Users;
use yii\base\Component;

class UsersComponent extends Component
{
    public $users_model_class;

    public function getModelUsers($params = []){
        $model = new $this->users_model_class;

        if(!empty($params)){
            $model->load($params);
        }

        return $model;
    }

    public function getUserByEmail($email){
        return Users::find()->andWhere(['email' => $email])->one();
    }

    public function auth($model){
        if($model->validate()){
            $user = $this->getUserByEmail($model->email);
            $user->username = $user->email;

            return \Yii::$app->user->login($user, 3600*24);
        }

        return false;
    }

    public function registration($model){
        $model->password_hash = \Yii::$app->security->generatePasswordHash($model->password);
        $model->token = \Yii::$app->security->generateRandomString();

        if($model->validate()){
            $model->save();
            return true;
        }

        return false;
    }
}