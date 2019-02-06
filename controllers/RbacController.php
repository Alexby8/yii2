<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 04.02.2019
 * Time: 18:10
 */

namespace app\controllers;


use app\base\BaseController;
use app\rbac\AuthorActivityRule;

class RbacController extends BaseController
{
    public function actionGen(){
        $authManager = \Yii::$app->authManager;
        $authManager->removeAll();

        $admin = $authManager->createRole('admin');
        $user = $authManager->createRole('user');

        $authManager->add($admin);
        $authManager->add($user);

        $createActivity = $authManager->createPermission('createActivity');
        $createActivity->description = "Создание события";

        $viewActivity = $authManager->createPermission('viewActivity');
        $viewActivity->description = "Просмотр любых событий";

        $authManager->add($createActivity);
        $authManager->add($viewActivity);

        $authManager->addChild($user, $createActivity);
        $authManager->addChild($admin, $user);
        $authManager->addChild($admin, $viewActivity);

        $authManager->assign($admin, 6);
        $authManager->assign($user, 7);

        $authorActivityRule = new AuthorActivityRule();
        $authManager->add($authorActivityRule);
        $authorActivityPermission = $authManager->createPermission('authorActivity');
        $authorActivityPermission->description = "Владелец ообытия";
        $authorActivityPermission->ruleName = $authorActivityRule->name;
        $authManager->add($authorActivityPermission);
        $authManager->addChild($user, $authorActivityPermission);
    }
}