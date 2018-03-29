<?php

use yii\db\Migration;

/**
 * Handles the creation of table `write_off`.
 */
class m180324_120753_update_write_off_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->renameColumn('write_off', 'update_by', 'updated_by');
        $this->renameColumn('write_off', 'update_at', 'updated_at');



    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->renameColumn('write_off', 'updated_by', 'update_by');
        $this->renameColumn('write_off', 'updated_at', 'update_at');
    }
}
