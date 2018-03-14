<?php

use yii\db\Migration;

/**
 * Class m180314_121106_add_position_column_to_categories
 */
class m180314_110000_add_position_column_to_categories extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('categories', 'position', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('categories', 'position');
        echo " Column position was deleted .\n";

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180314_121106_add_position_column_to_categories cannot be reverted.\n";

        return false;
    }
    */
}
