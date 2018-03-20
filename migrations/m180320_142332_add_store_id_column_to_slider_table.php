<?php

use yii\db\Migration;

/**
 * Handles adding store_id to table `slider`.
 */
class m180320_142332_add_store_id_column_to_slider_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('slider', 'store_id', $this->integer());

        $this->createIndex(
            'FK_slider_store_id',
            'slider',
            'store_id'
        );

        $this->addForeignKey(
            'FK_slider_store_id',
            'slider',
            'store_id',
            'store',
            'id',
            'NO ACTION'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'FK_slider_store_id',
            'slider'
        );

        $this->dropIndex(
            'FK_slider_store_id',
            'slider'
        );
        $this->dropColumn('slider', 'store_id');
    }

}
