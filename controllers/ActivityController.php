<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 23.01.2019
 * Time: 20:57
 */

namespace app\controllers;


use app\components\base\BaseController;
use app\controllers\actions\ActivityIndexAction;
use yii\web\Controller;

class ActivityController extends BaseController
{

    public function actions(){
        return [
            'index' => ['class' => ActivityIndexAction::class]
        ];
    }

}