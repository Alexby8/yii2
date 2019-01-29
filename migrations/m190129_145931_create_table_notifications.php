<?php

use yii\db\Migration;

/**
 * Class m190129_145931_create_table_notifications
 */
class m190129_145931_create_table_notifications extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('notifications',[
            'id'=>$this->primaryKey(),
            'user_id'=>$this->integer()->notNull(),
            'activity_id'=>$this->integer()->notNull(),
            'text'=>$this->text(),
            'date_created'=>$this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')
        ]);

        $this->addForeignKey('notifications_userFK', 'notifications', 'user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('notifications_activityFK', 'notifications', 'activity_id', 'activity', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('notifications');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190129_145931_create_table_notifications cannot be reverted.\n";

        return false;
    }
    */
}
