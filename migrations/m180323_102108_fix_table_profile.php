<?php
use yii\db\Migration;

class m180323_102108_fix_table_profile extends  Migration

{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('profile', 'phone', $this->string(20));
        $this->alterColumn('profile', 'inn', $this->string(20));


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return true;
    }
}