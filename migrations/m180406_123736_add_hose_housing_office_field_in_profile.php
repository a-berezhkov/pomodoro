<?php

use yii\db\Migration;

/**
 * Class m180406_123736_add_hose_housing_office_field_in_profile
 */
class m180406_123736_add_hose_housing_office_field_in_profile extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('profile','address_city',$this->string(255)->notNull()->comment('Город'));
        $this->addColumn('profile','address_street',$this->string(255)->notNull()->comment('Улица'));
        $this->addColumn('profile','address_house',$this->string(255)->notNull()->comment('Дом'));
        $this->addColumn('profile','address_housing',$this->string(255)->comment('Корпус'));
        $this->addColumn('profile','address_office',$this->string(255)->comment('Город'));
        $this->dropColumn('profile','address');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropColumn('profile','address_city');
        $this->dropColumn('profile','address_street');
        $this->dropColumn('profile','address_house');
        $this->dropColumn('profile','address_housing');
        $this->dropColumn('profile','address_office');


    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180406_123736_add_hose_housing_office_field_in_profile cannot be reverted.\n";

        return false;
    }
    */
}
