<?php

use yii\db\Migration;

/**
 * Class m180314_110253_insert_demo_data_in_categories
 */
class m180314_110253_insert_demo_data_in_categories extends Migration
{
    /**
     * if need random string use Yii::$app->getSecurity()->generateRandomString(32),
     * real filename is <id>_<random_string>
     * {@inheritdoc}
     */
    public function safeUp()
    {
        Yii::$app->db->createCommand('set foreign_key_checks=0')->execute();
        Yii::$app->db->createCommand()->truncateTable('ImageManager')->execute();
        Yii::$app->db->createCommand()->truncateTable('categories')->execute();
        Yii::$app->db->createCommand('set foreign_key_checks=1')->execute();

        // Зелень
        $this->insert('ImageManager', [
            'id' => 1,
            'filename' => 'Зелень (l-1).png',
            'fileHash' => 'biXNLefUFqhHTuX8zChcgPJrcPRW0D1d',
            'created' => new \yii\db\Expression('NOW()'),
        ]);
        $this->insert('categories', [
            'id' => NULL,
            'name' => 'Зелень',
            'image_id' => 1,
            'icon' => 'product-icon product-icon-greens',
            'position' => 'bottom',
        ]);


        //Орехи
        $this->insert('ImageManager', [
            'id' => 2,
            'filename' => 'Орехи (l-2).png',
            'fileHash' => '8WXyYQTmQuR4_ABz7S2dJj6vr94io_vC',
            'created' => new \yii\db\Expression('NOW()'),
        ]);
        $this->insert('categories', [
            'id' => NULL,
            'name' => 'Орехи',
            'image_id' => 2,
            'icon' => 'product-icon product-icon-nuts',
            'position' => 'bottom',
        ]);

        // Овощи заморозка
        $this->insert('ImageManager', [
            'id' => 3,
            'filename' => 'Овощи заморозка (l-3).png',
            'fileHash' => '8kYx8CH8GOfhjX9ugE8JUK1IZaYvMa-B',
            'created' => new \yii\db\Expression('NOW()'),
        ]);
        $this->insert('categories', [
            'id' => NULL,
            'name' => 'Овощи заморозка',
            'image_id' => 3,
            'icon' => 'product-icon product-icon-peppers',
            'position' => 'bottom',
        ]);

        // Фрукты заморозка
        $this->insert('ImageManager', [
            'id' => 4,
            'filename' => 'Фрукты заморозка (l-4).png',
            'fileHash' => 'pBzgQ-D-CFUMY64m7jrVW0P54RUDmQ7D',
            'created' => new \yii\db\Expression('NOW()'),

        ]);
        $this->insert('categories', [
            'id' => NULL,
            'name' => 'Фрукты заморозка',
            'image_id' => 4,
            'icon' => 'product-icon product-icon-berry-froze',
            'position' => 'bottom',
        ]);

        // Большой слайдер только демо
        $this->insert('ImageManager', [
            'id' => 5,
            'filename' => '/web/img/products/m-1.png',
            'fileHash' => Yii::$app->getSecurity()->generateRandomString(32),
            'created' => new \yii\db\Expression('NOW()'),
        ]);


        //product sub-main
        // Овощи
        $this->insert('ImageManager', [
            'id' => 6,
            'filename' => 'Овощи m-2.png',
            'fileHash' => 'mQbjj0X3fWogDD8u3lhLK6ZbpNqYHj5J',
            'created' => new \yii\db\Expression('NOW()'),
        ]);
        $this->insert('categories', [
            'id' => NULL,
            'name' => 'Овощи',
            'image_id' => 6,
            'icon' => '',
            'position' => 'right',
        ]);
        //Фрукты
        $this->insert('ImageManager', [
            'id' => 7,
            'filename' => 'Фрукты m-3.png',
            'fileHash' => '2ck1xz4lYG57mWWXi01bZXousETLBy_n',
            'created' => new \yii\db\Expression('NOW()'),
        ]);

        $this->insert('categories', [
            'id' => NULL,
            'name' => 'Фрукты',
            'image_id' => 7,
            'icon' => '',
            'position' => 'right',
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
        Yii::$app->db->createCommand()->truncateTable('categories')->execute();
        Yii::$app->db->createCommand('set foreign_key_checks=1')->execute();

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
