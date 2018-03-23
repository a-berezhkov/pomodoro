<?php

use yii\db\Migration;

class m180323_102041_create_table_cart extends Migration
{
    public function safeUp()
    {
        Yii::$app->db->createCommand('set foreign_key_checks=0')->execute();
        $this->execute("DROP TABLE IF EXISTS cart");
        Yii::$app->db->createCommand('set foreign_key_checks=1')->execute();
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%cart}}', [
            'id' => $this->primaryKey(),
            'id_store' => $this->integer(11)->comment('Товар'),
            'count' => $this->integer(11)->notNull()->comment('Количество ящиков'),
            'sum' => $this->float()->notNull()->comment('Сумма'),
            'is_sale' => $this->boolean()->notNull()->comment('По акции? (для аналитики)'),
            'profile_id' => $this->integer(11)->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
            'updated_by' => $this->integer(11),
            'confirm' => $this->boolean()->defaultValue('0')->comment('Подтвержден ли заказ'),
        ], $tableOptions);

        $this->addForeignKey('FK_cart_profile_user_id', '{{%cart}}', 'profile_id', '{{%profile}}', 'user_id');
        $this->addForeignKey('FK_cart_profile_user_id2', '{{%cart}}', 'updated_by', '{{%profile}}', 'user_id');
        $this->addForeignKey('FK_cart_store_id', '{{%cart}}', 'id_store', '{{%store}}', 'id');
    }

    public function safeDown()
    {
        $this->dropTable('{{%cart}}');
    }
}
