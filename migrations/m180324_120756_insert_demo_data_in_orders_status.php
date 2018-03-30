<?php

use yii\db\Migration;

/**
 * Class m180315_101258_insert_demo_data_in_countries
 */
class m180324_120756_insert_demo_data_in_orders_status  extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        Yii::$app->db->createCommand('set foreign_key_checks=0')->execute();
        Yii::$app->db->createCommand()->truncateTable('orders_status')->execute();
        Yii::$app->db->createCommand('set foreign_key_checks=1')->execute();
        $this->insert('orders_status', [
            'id' => 1,
            'name' => 'Заказ оформлен',
        ]);
        $this->insert('orders_status', [
            'id' => 2,
            'name' => 'Заказ собирается',
        ]);
        $this->insert('orders_status', [
            'id' => 3,
            'name' => 'Заказ отправлен',
        ]);
        $this->insert('orders_status', [
            'id' => 4,
            'name' => 'Заказ в пути',
        ]);
        $this->insert('orders_status', [
            'id' => 5,
            'name' => 'Заказ длставлен',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        Yii::$app->db->createCommand('set foreign_key_checks=0')->execute();
        Yii::$app->db->createCommand()->truncateTable('orders_status')->execute();
        Yii::$app->db->createCommand('set foreign_key_checks=1')->execute();

        echo "m180315_101258_insert_demo_data_in_countries  is cleaned.\n";

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180315_101258_insert_demo_data_in_countries cannot be reverted.\n";

        return false;
    }
    */
}
