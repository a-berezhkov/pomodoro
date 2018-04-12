<?php

use yii\db\Migration;

/**
 * Class m180412_095446_add_payment_field_in_orders_table
 */
class m180412_095446_add_payment_field_in_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('orders','payment',$this->string(255)->comment('Метод оплаты (card/cash/bill)'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
         $this->dropColumn('orders','payment');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180412_095446_add_payment_field_in_orders_table cannot be reverted.\n";

        return false;
    }
    */
}
