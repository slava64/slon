<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%site_category}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%site}}`
 * - `{{%category}}`
 */
class m231004_082243_create_site_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%site_category}}', [
            'id' => $this->primaryKey(),
            'site_id' => $this->integer()->notNull(),
            'category_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `site_id`
        $this->createIndex(
            '{{%idx-site_category-site_id}}',
            '{{%site_category}}',
            'site_id'
        );

        // add foreign key for table `{{%site}}`
        $this->addForeignKey(
            '{{%fk-site_category-site_id}}',
            '{{%site_category}}',
            'site_id',
            '{{%site}}',
            'id',
            'RESTRICT'
        );

        // creates index for column `category_id`
        $this->createIndex(
            '{{%idx-site_category-category_id}}',
            '{{%site_category}}',
            'category_id'
        );

        // add foreign key for table `{{%category}}`
        $this->addForeignKey(
            '{{%fk-site_category-category_id}}',
            '{{%site_category}}',
            'category_id',
            '{{%category}}',
            'id',
            'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%site}}`
        $this->dropForeignKey(
            '{{%fk-site_category-site_id}}',
            '{{%site_category}}'
        );

        // drops index for column `site_id`
        $this->dropIndex(
            '{{%idx-site_category-site_id}}',
            '{{%site_category}}'
        );

        // drops foreign key for table `{{%category}}`
        $this->dropForeignKey(
            '{{%fk-site_category-category_id}}',
            '{{%site_category}}'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            '{{%idx-site_category-category_id}}',
            '{{%site_category}}'
        );

        $this->dropTable('{{%site_category}}');
    }
}
