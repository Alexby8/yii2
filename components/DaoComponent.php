<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 29.01.2019
 * Time: 16:41
 */

namespace app\components;


use yii\base\Component;

class DaoComponent extends Component
{
    public function getAllUsers(){
        $sql='select * from users;';
        $db=$this->getDb();
        return $db->createCommand($sql)->queryAll();
    }

    public function getDb(){
        return \Yii::$app->db;
    }
}