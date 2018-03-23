<?php

use yii\db\Migration;

class m180323_102032_create_table_orders_status extends Migration
{

    public function safeUp()
    {
        Yii::$app->db->createCommand('set foreign_key_checks=0')->execute();
        $this->execute("DROP TABLE IF EXISTS orders_status");
        Yii::$app->db->createCommand('set foreign_key_checks=1')->execute();

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%orders_status}}', [
            'id' => $this->primaryKey(),
            'name' => $this->integer(11)->notNull(),
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('{{%orders_status}}');
    }
}
