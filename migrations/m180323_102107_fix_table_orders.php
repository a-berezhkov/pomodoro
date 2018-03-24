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


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('orders', 'address_city', $this->string(255));
        $this->dropColumn('orders', 'comment');
    }

}