<?php

use yii\db\Migration;

/**
 * Handles adding position to table `profile`.
 */
class m180314_184726_add_position_column_to_profile_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('profile', 'inn', $this->integer());
        $this->addColumn('profile', 'address', $this->string());
        $this->addColumn('profile', 'company_name', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('profile', 'inn');
        $this->dropColumn('profile', 'address');
        $this->dropColumn('profile', 'company_name');
    }
}
