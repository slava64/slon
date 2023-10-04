<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m231004_072702_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
            'title' => $this->string(255),
            'description' => $this->text(),
            'parent_id' => $this->integer(),
        ]);

        // creates index for column `parent_id`
        $this->createIndex(
            '{{%idx-category-parent_id}}',
            '{{%category}}',
            'parent_id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops index for column `parent_id`
        $this->dropIndex(
            '{{%idx-category-parent_id}}',
            '{{%category}}'
        );

        $this->dropTable('{{%category}}');
    }
}
