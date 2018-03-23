<?php

use yii\db\Migration;

class m180323_102033_create_table_orders extends Migration
{
    public function safeUp()
    {

        Yii::$app->db->createCommand('set foreign_key_checks=0')->execute();
        $this->execute("DROP TABLE IF EXISTS orders");
        Yii::$app->db->createCommand('set foreign_key_checks=1')->execute();

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%orders}}', [
            'id' => $this->primaryKey(),
            'address_city' => $this->string(255)->notNull()->comment('Город'),
            'address_street' => $this->string(255)->notNull()->comment('Улица'),
            'address_house' => $this->string(255)->notNull()->comment('Дом'),
            'address_housing' => $this->string(255)->comment('Корпус'),
            'address_office' => $this->string(255),
            'address_phone' => $this->string(20),
            'delivery_date' => $this->dateTime()->notNull()->comment('Дата доставки'),
            'delivery_interval' => $this->string(255)->notNull()->comment('Интервал доставки'),
            'delivery_status' => $this->integer(11)->notNull()->defaultValue('1'),
            'created_at' => $this->dateTime(),
            'created_by' => $this->dateTime(),
            'dropping' => $this->boolean(),
            'dropping_at' => $this->dateTime(),
            'unique_code'=>$this->string(50)->unique()
        ], $tableOptions);

        $this->addForeignKey('FK_orders_orders_status_id', '{{%orders}}', 'delivery_status', '{{%orders_status}}', 'id');
    }

    public function safeDown()
    {
        $this->dropTable('{{%orders}}');
    }
}
