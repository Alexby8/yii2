<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 05.02.2019
 * Time: 21:47
 */

namespace app\rbac;

use yii\rbac\Rule;

class AuthorActivityRule extends Rule
{
    public $name = "authorActivityRule";

    public function execute($user, $item, $params)
    {
        return isset($params["activity"]) ? $params["activity"]->user_id == $user : false;
    }
}