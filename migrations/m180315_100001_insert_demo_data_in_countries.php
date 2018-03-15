<?php

use yii\db\Migration;

/**
 * Class m180315_101258_insert_demo_data_in_countries
 */
class m180315_100001_insert_demo_data_in_countries extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        Yii::$app->db->createCommand('set foreign_key_checks=0')->execute();
        Yii::$app->db->createCommand()->truncateTable('countries')->execute();
        Yii::$app->db->createCommand('set foreign_key_checks=1')->execute();
        $this->insert('countries', [
            'id' => 1,
            'name' => 'Россия',
        ]);
        $this->insert('countries', [
            'id' => 2,
            'name' => 'Эквадор',
        ]);
        $this->insert('countries', [
            'id' => 3,
            'name' => 'Испания',
        ]);
        $this->insert('countries', [
            'id' => 4,
            'name' => 'Израиль',
        ]);
        $this->insert('countries', [
            'id' => 5,
            'name' => 'Италия',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        Yii::$app->db->createCommand('set foreign_key_checks=0')->execute();
        Yii::$app->db->createCommand()->truncateTable('countries')->execute();
        Yii::$app->db->createCommand('set foreign_key_checks=1')->execute();

        echo "m180315_101258_insert_demo_data_in_countries  is cleaned.\n";

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180315_101258_insert_demo_data_in_countries cannot be reverted.\n";

        return false;
    }
    */
}
