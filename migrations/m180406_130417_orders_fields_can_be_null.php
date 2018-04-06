<?php

use yii\db\Migration;

/**
 * Class m180406_130417_orders_fields_can_be_null
 */
class m180406_130417_orders_fields_can_be_null extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('orders', 'address_street', $this->string(255)->null());
        $this->alterColumn('orders', 'address_house', $this->string(255)->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('orders', 'address_street', $this->string(255)->notNull());
        $this->alterColumn('orders', 'address_house', $this->string(255)->notNull());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180406_130417_orders_fields_can_be_null cannot be reverted.\n";

        return false;
    }
    */
}
