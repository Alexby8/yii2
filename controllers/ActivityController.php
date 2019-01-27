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
use app\models\Activity;
use yii\helpers\ArrayHelper;
use yii\helpers\StringHelper;
use yii\helpers\VarDumper;
use yii\web\Controller;

class ActivityController extends BaseController
{

    public function actions(){
        return [
            'index' => ['class' => ActivityIndexAction::class]
        ];
    }

    public function actionHelpers(){
        $data=['param1'=>'value1','sub'=>['param'=>'value_sub']];

        $aatrs=[['id'=>1,'value'=>'pert'],['id'=>2,'value'=>'Elena']];
        $obj=new Activity(['title'=>'value']);

        
        $val=ArrayHelper::map($aatrs,'id','value');

        VarDumper::dump($val);

        return $this->render('helpers',['val'=>$val,'model'=>$obj]);
    }

}