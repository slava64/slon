<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%parking_domain}}`.
 */
class m231004_074106_create_parking_domain_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%parking_domain}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
            'is_active' => $this->integer(1),
        ]);

        // creates index for column `is_active`
        $this->createIndex(
            '{{%idx-parking_domain-is_active}}',
            '{{%parking_domain}}',
            'is_active'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops index for column `is_active`
        $this->dropIndex(
            '{{%idx-parking_domain-is_active}}',
            '{{%parking_domain}}',
        );

        $this->dropTable('{{%parking_domain}}');
    }
}
