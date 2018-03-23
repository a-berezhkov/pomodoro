<?php

use yii\db\Migration;

/**
 * Class m180323_000504_update_categories_icons_data
 */
class m180323_000504_update_categories_icons_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->update('categories', ['icon' => 'category-icon-green category-icon-greens'], ['id' => '1']);
        $this->update('categories', ['icon' => 'category-icon-brown category-icon-nuts'], ['id' => '2']);
        $this->update('categories', ['icon' => 'category-icon-blue category-icon-vegetables-froze'], ['id' => '3']);
        $this->update('categories', ['icon' => 'category-icon-blue category-icon-fruits-froze'], ['id' => '4']);
        $this->update('categories', ['icon' => 'category-icon-red category-icon-vegetables'], ['id' => '5']);
        $this->update('categories', ['icon' => 'category-icon-yellow category-icon-fruits'], ['id' => '6']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180323_000504_update_categories_icons_data cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180323_000504_update_categories_icons_data cannot be reverted.\n";

        return false;
    }
    */
}
