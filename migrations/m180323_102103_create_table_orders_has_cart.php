<?php

use yii\db\Migration;

class m180323_102103_create_table_orders_has_cart extends Migration
{
    public function safeUp()
    {
        Yii::$app->db->createCommand('set foreign_key_checks=0')->execute();
        $this->execute("DROP TABLE IF EXISTS orders_has_cart");
        Yii::$app->db->createCommand('set foreign_key_checks=1')->execute();
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%orders_has_cart}}', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer(11)->notNull(),
            'cart_id' => $this->integer(11)->notNull(),
        ], $tableOptions);

        $this->addForeignKey('FK_orders_has_cart_cart_id', '{{%orders_has_cart}}', 'cart_id', '{{%cart}}', 'id');
        $this->addForeignKey('FK_orders_has_cart_orders_id', '{{%orders_has_cart}}', 'order_id', '{{%orders}}', 'id');
    }

    public function safeDown()
    {
        $this->dropTable('{{%orders_has_cart}}');
    }
}
