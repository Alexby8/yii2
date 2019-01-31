<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 29.01.2019
 * Time: 16:19
 */

namespace app\controllers;


use app\components\base\BaseController;
use app\components\DaoComponent;
use yii\web\Controller;

class DaoController extends BaseController
{
    public function actionIndex(){
        /** @var DaoComponent $dao */
        $dao = \Yii::$app->dao;

        $users = $dao->getAllUsers();

        return $this->render('index', ["users" => $users]);
    }
}