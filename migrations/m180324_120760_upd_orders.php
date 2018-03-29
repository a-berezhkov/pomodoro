<?php

use yii\db\Migration;

/**
 * Class m180315_101258_insert_demo_data_in_countries
 */
class m180324_120760_upd_orders  extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('orders', 'created_by', $this->integer(11));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {


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
