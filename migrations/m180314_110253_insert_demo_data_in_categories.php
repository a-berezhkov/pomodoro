<?php

use yii\db\Migration;

/**
 * Class m180314_110253_insert_demo_data_in_categories
 */
class m180314_110253_insert_demo_data_in_categories extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // Зелень
        $this->insert('ImageManager', [
            'id' => 1,
            'filename' => '/web/img/products/l-1.png',
            'fileHash' => Yii::$app->getSecurity()->generateRandomString(32),
            'created' => new \yii\db\Expression('NOW()'),
        ]);
        $this->insert('categories', [
            'id' => NULL,
            'name' => 'Зелень',
            'image_id' => 1,
            'icon' => 'product-icon product-icon-greens',
        ]);


        //Орехи
        $this->insert('ImageManager', [
            'id' => 2,
            'filename' => '/web/img/products/l-2.png',
            'fileHash' => Yii::$app->getSecurity()->generateRandomString(32),
            'created' => new \yii\db\Expression('NOW()'),
        ]);
        $this->insert('categories', [
            'id' => NULL,
            'name' => 'Орехи',
            'image_id' => 2,
            'icon' => 'product-icon product-icon-nuts',
        ]);

        // Овощи заморозка
        $this->insert('ImageManager', [
            'id' => 3,
            'filename' => '/web/img/products/l-2.png',
            'fileHash' => Yii::$app->getSecurity()->generateRandomString(32),
            'created' => new \yii\db\Expression('NOW()'),
        ]);
        $this->insert('categories', [
            'id' => NULL,
            'name' => 'Овощи заморозка',
            'image_id' => 3,
            'icon' => 'product-icon product-icon-peppers',
        ]);

        // Фрукты заморозка
        $this->insert('ImageManager', [
            'id' => 4,
            'filename' => '/web/img/products/l-2.png',
            'fileHash' => Yii::$app->getSecurity()->generateRandomString(32),
            'created' => new \yii\db\Expression('NOW()'),
        ]);
        $this->insert('categories', [
            'id' => NULL,
            'name' => 'Фрукты заморозка',
            'image_id' => 4,
            'icon' => 'product-icon product-icon-peppers',
        ]);

        // Большой слайдер
        $this->insert('ImageManager', [
            'id' => NULL,
            'filename' => '/web/img/products/m-1.png',
            'fileHash' => Yii::$app->getSecurity()->generateRandomString(32),
            'created' => new \yii\db\Expression('NOW()'),
        ]);
        //product sub-main
        $this->insert('ImageManager', [
            'id' => NULL,
            'filename' => '/web/img/products/m-2.png',
            'fileHash' => Yii::$app->getSecurity()->generateRandomString(32),
            'created' => new \yii\db\Expression('NOW()'),
        ]);
        $this->insert('ImageManager', [
            'id' => NULL,
            'filename' => '/web/img/products/m-3.png',
            'fileHash' => Yii::$app->getSecurity()->generateRandomString(32),
            'created' => new \yii\db\Expression('NOW()'),
        ]);
        /**
         * For SALE
         */
        $this->insert('ImageManager', [
            'id' => NULL,
            'filename' => '/web/img/products/1.png',
            'fileHash' => Yii::$app->getSecurity()->generateRandomString(32),
            'created' => new \yii\db\Expression('NOW()'),
        ]);
        $this->insert('ImageManager', [
            'id' => NULL,
            'filename' => '/web/img/products/2.png',
            'fileHash' => Yii::$app->getSecurity()->generateRandomString(32),
            'created' => new \yii\db\Expression('NOW()'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(){
        Yii::$app->db->createCommand('set foreign_key_checks=0')->execute();
        Yii::$app->db->createCommand()->truncateTable('ImageManager')->execute();
        Yii::$app->db->createCommand('set foreign_key_checks=1')->execute();
        Yii::$app->db->createCommand()->truncateTable('categories')->execute();
        echo "ImageManager is clean .\n";

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180314_110253_insert_demo_data_in_categories cannot be reverted.\n";

        return false;
    }
    */
}
