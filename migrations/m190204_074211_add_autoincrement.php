<?php

use yii\db\Migration;

/**
 * Class m190204_074211_add_autoincrement
 */
class m190204_074211_add_autoincrement extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropForeignKey('activity_userFK', 'activity');
        $this->dropForeignKey('notifications_userFK', 'notifications');
        $this->dropForeignKey('notifications_activityFK', 'notifications');

        $this->alterColumn('users', 'id', 'INT(11) UNSIGNED NOT NULL AUTO_INCREMENT');
        $this->alterColumn('activity', 'id', 'INT(11) UNSIGNED NOT NULL AUTO_INCREMENT');
        $this->alterColumn('notifications', 'id', 'INT(11) UNSIGNED NOT NULL AUTO_INCREMENT');

        $this->dropIndex('activity_userFK', 'activity');
        $this->dropIndex('notifications_userFK', 'notifications');
        $this->dropIndex('notifications_activityFK', 'notifications');

        $this->addForeignKey('activity_userFK', 'activity', 'user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('notifications_userFK', 'notifications', 'user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('notifications_activityFK', 'notifications', 'activity_id', 'activity', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190204_074211_add_autoincrement cannot be reverted.\n";

        //return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190204_074211_add_autoincrement cannot be reverted.\n";

        return false;
    }
    */
}
