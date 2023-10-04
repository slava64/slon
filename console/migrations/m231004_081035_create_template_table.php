<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%template}}`.
 */
class m231004_081035_create_template_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%template}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(10)->notNull(),
            'path' => $this->string(50),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%template}}');
    }
}
