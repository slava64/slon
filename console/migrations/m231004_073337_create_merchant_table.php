<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%merchant}}`.
 */
class m231004_073337_create_merchant_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%merchant}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
            'short_description' => $this->string(),
            'description' => $this->string(),
            'url' => $this->string(50),
            'logo_url' => $this->string(255),
            'affiliate_link' => $this->string(255),
            'category_ids' => $this->string(50),
            'is_active' => $this->integer(1),
        ]);

        // creates index for column `is_active`
        $this->createIndex(
            '{{%idx-merchant-is_active}}',
            '{{%merchant}}',
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
            '{{%idx-merchant-is_active}}',
            '{{%merchant}}'
        );

        $this->dropTable('{{%merchant}}');
    }
}
