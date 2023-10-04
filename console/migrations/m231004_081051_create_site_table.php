<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%site}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%template}}`
 */
class m231004_081051_create_site_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%site}}', [
            'id' => $this->primaryKey(),
            'domain' => $this->string(10)->notNull(),
            'logo_link' => $this->string(255),
            'main_title' => $this->string(255),
            'main_description' => $this->string(),
            'title_template' => $this->string(255),
            'url_template' => $this->string(100),
            'info' => $this->string(),
            'template_id' => $this->integer(),
        ]);

        // creates index for column `domain`
        $this->createIndex(
            '{{%idx-site-domain}}',
            '{{%site}}',
            'domain'
        );

        // creates index for column `template_id`
        $this->createIndex(
            '{{%idx-site-template_id}}',
            '{{%site}}',
            'template_id'
        );

        // add foreign key for table `{{%template}}`
        $this->addForeignKey(
            '{{%fk-site-template_id}}',
            '{{%site}}',
            'template_id',
            '{{%template}}',
            'id',
            'SET NULL'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops index for column `domain`
        $this->dropIndex(
            '{{%idx-site-domain}}',
            '{{%site}}',
        );

        // drops foreign key for table `{{%template}}`
        $this->dropForeignKey(
            '{{%fk-site-template_id}}',
            '{{%site}}'
        );

        // drops index for column `template_id`
        $this->dropIndex(
            '{{%idx-site-template_id}}',
            '{{%site}}'
        );

        $this->dropTable('{{%site}}');
    }
}
