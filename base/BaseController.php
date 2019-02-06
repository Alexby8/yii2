<?php
/**
 * Created by PhpStorm.
 * User: Talisman
 * Date: 25.01.2019
 * Time: 12:45
 */

namespace app\base;


use yii\web\Controller;

class BaseController extends Controller
{
    public function beforeAction($action)
    {
        \Yii::$app->view->params['menu_label'] = 'Мой лэйбл';
        return parent::beforeAction($action);
    }
}