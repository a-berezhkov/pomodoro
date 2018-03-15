<?php

use yii\db\Migration;

/**
 * Class m180315_100553_insert_demo_data_in_store
 */
class m180315_100553_insert_demo_data_in_store extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        Yii::$app->db->createCommand('set foreign_key_checks=0')->execute();
        Yii::$app->db->createCommand()->truncateTable('store')->execute();
        Yii::$app->db->createCommand('set foreign_key_checks=1')->execute();

        $this->insert('store', [
            'id' => 1,
            'name' => 'Томаты Бакинские',
            'boxes_count' => 13,
            'box_weight' => 20,
            'box_price' => 7640,
            'desc' => NULL,
            'logo_id' => 10,
            'country_id' => 1,
            'category_id' => 6,
            'is_sale' => true,
            'is_active' => true,
            'created_by' => 1   ,
            'updated_by' => 1,
            'discount_box_price' => 6940,
            'created_at' => new \yii\db\Expression('NOW()'),
            'updated_at' => new \yii\db\Expression('NOW()'),
        ]);

        $this->insert('store', [
            'id' => 2,
            'name' => 'Огурцы Муромские',
            'boxes_count' => 245,
            'box_weight' => 29,
            'box_price' => 23400,
            'desc' => NULL,
            'logo_id' => 11,
            'country_id' => 1,
            'category_id' => 5,
            'is_sale' => true,
            'is_active' => true,
            'created_by' => 1   ,
            'updated_by' => 1,
            'discount_box_price' => 19600,
            'created_at' => new \yii\db\Expression('NOW()'),
            'updated_at' => new \yii\db\Expression('NOW()'),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180315_100553_insert_demo_data_in_store cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180315_100553_insert_demo_data_in_store cannot be reverted.\n";

        return false;
    }
    */
}
