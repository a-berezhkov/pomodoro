<?php

use yii\db\Migration;

/**
 * Class m180415_133120_add_column_kpp_in_profile
 */
class m180415_133120_add_column_kpp_in_profile extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('profile','kpp',$this->string(20)->comment('КПП'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('profile','kpp');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180415_133120_add_column_kpp_in_profile cannot be reverted.\n";

        return false;
    }
    */
}
