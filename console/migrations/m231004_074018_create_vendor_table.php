<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%vendor}}`.
 */
class m231004_074018_create_vendor_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%vendor}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%vendor}}');
    }
}
