<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 23.01.2019
 * Time: 22:21
 */

namespace app\controllers;

use app\base\BaseController;
use app\controllers\actions\DaysIndexAction;
use yii\web\Controller;

class DaysController extends BaseController
{
    public function actions(){
        return [
            'index' => ['class' => DaysIndexAction::class]
        ];
    }
}