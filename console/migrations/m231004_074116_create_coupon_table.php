<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%coupon}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%merchant}}`
 */
class m231004_074116_create_coupon_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%coupon}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'description' => $this->string(),
            'code' => $this->string(10),
            'link' => $this->string(255),
            'begin_at' => $this->datetime(),
            'end_at' => $this->datetime(),
            'merchant_id' => $this->integer()->notNull(),
            'is_active' => $this->integer(1),
        ]);

        // creates index for column `is_active`
        $this->createIndex(
            '{{%idx-coupon-is_active}}',
            '{{%coupon}}',
            'is_active'
        );

        // creates index for column `merchant_id`
        $this->createIndex(
            '{{%idx-coupon-merchant_id}}',
            '{{%coupon}}',
            'merchant_id'
        );

        // add foreign key for table `{{%merchant}}`
        $this->addForeignKey(
            '{{%fk-coupon-merchant_id}}',
            '{{%coupon}}',
            'merchant_id',
            '{{%merchant}}',
            'id',
            'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops index for column `is_active`
        $this->dropIndex(
            '{{%idx-coupon-is_active}}',
            '{{%coupon}}',
        );

        // drops foreign key for table `{{%merchant}}`
        $this->dropForeignKey(
            '{{%fk-coupon-merchant_id}}',
            '{{%coupon}}'
        );

        // drops index for column `merchant_id`
        $this->dropIndex(
            '{{%idx-coupon-merchant_id}}',
            '{{%coupon}}'
        );

        $this->dropTable('{{%coupon}}');
    }
}
