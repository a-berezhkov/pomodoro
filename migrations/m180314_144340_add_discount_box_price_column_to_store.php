<?php

use yii\db\Migration;

/**
 * Class m180314_144340_add_discount_box_price_column_to_store
 */
class m180314_144340_add_discount_box_price_column_to_store extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('store', 'discount_box_price', $this->float());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('store', 'discount_box_price');
        echo " Column position was deleted .\n";

        return true;

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180314_144340_add_discount_box_price_column_to_categories cannot be reverted.\n";

        return false;
    }
    */
}
