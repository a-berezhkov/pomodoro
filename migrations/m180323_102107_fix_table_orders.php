<?php
use yii\db\Migration;

class m180323_102107_fix_table_orders extends  Migration

{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = Yii::$app->db->schema->getTableSchema('orders');
        if (isset($table->columns['address_city'])) {
            $this->dropColumn('orders', 'address_city');
        }
        if (!isset($table->columns['comment'])) {
            $this->addColumn('orders', 'comment', $this->text());
        }
        $this->addColumn('orders', 'google_id', $this->string(255));


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $table = Yii::$app->db->schema->getTableSchema('orders');
        if (!isset($table->columns['address_city'])) {
            $this->addColumn('orders', 'address_city', $this->string(255));
        }
        if (isset($table->columns['comment'])) {
            $this->dropColumn('orders', 'comment');
        }

        if (isset($table->columns['google_id'])) {
            $this->dropColumn('orders', 'google_id');
        }

    }

}