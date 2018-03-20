<?php

use yii\db\Migration;

/**
 * Handles the creation of table `write_off`.
 */
class m180320_120753_create_write_off_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('write_off', [
            'id' => $this->primaryKey(),
            'id_store' => $this->integer(11),
            'count_box' => $this->integer(11),
            'count_weight' => $this->float(),
            'in' => $this->boolean(),
            'out' => $this->boolean(),
            'created_at' => $this->dateTime(),
            'update_at' => $this->dateTime(),
            'created_by' => $this->integer(11),
            'update_by' => $this->integer(11)
        ]);

        $this->createIndex(
            'FK_write_off_store_id',
            'write_off',
            'id_store'
        );

        $this->addForeignKey(
        'FK_write_off_store_id',
        'write_off',
        'id_store',
        'store',
        'id',
        'CASCADE'
        );

        $this->createIndex(
            'IDX_write_off_created_by',
            'write_off',
            'created_by'
        );

        $this->addForeignKey(
            'FK_write_off_profile_user_id',
            'write_off',
            'created_by',
            'profile',
            'user_id'
        );

        $this->createIndex(
          'IDX_write_off_updated_by',
          'write_off',
          'update_by'
        );

        $this->addForeignKey(
            'FK_write_off_profile1_user_id',
            'write_off',
            'update_by',
            'profile',
            'user_id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
          'FK_write_off_profile1_user_id',
          'write_off'
        );

        $this->dropIndex(
          'IDX_write_off_updated_by',
          'write_off'
        );

        $this->dropForeignKey(
            'FK_write_off_profile_user_id',
            'write_off'
        );

        $this->dropIndex(
          'IDX_write_off_created_by',
          'write_off'
        );

        $this->dropForeignKey(
          'FK_write_off_store_id',
          'write_off'
        );

        $this->dropIndex(
          'FK_write_off_store_id',
          'write_off'
        );

        $this->dropTable('write_off');
    }
}
