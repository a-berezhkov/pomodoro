<?php

use yii\db\Migration;

/**
 * Class m180414_094823_add_summa_filed_in_orders_table
 */
class m180414_094823_add_summa_filed_in_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('orders','sum_order',$this->bigInteger()->comment('Сумма заказа'));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('orders','sum_order');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180414_094823_add_summa_filed_in_orders_table cannot be reverted.\n";

        return false;
    }
    */
}
