<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%offer}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%merchant}}`
 * - `{{%vendor}}`
 * - `{{%currency}}`
 * - `{{%category}}`
 */
class m231004_082941_create_offer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%offer}}', [
            'id' => $this->primaryKey(),
            'merchant_id' => $this->integer()->notNull(),
            'is_available' => $this->integer(1),
            'picture' => $this->string(),
            'thumbnail' => $this->string(255),
            'name' => $this->string(255)->notNull(),
            'description' => $this->string(),
            'params' => $this->string(),
            'model' => $this->string(50),
            'vendor_id' => $this->integer()->notNull(),
            'oldprice' => $this->decimal(5,2),
            'price' => $this->decimal(5,2),
            'discount' => $this->integer(2),
            'currency_id' => $this->integer()->notNull(),
            'url' => $this->string(255),
            'category_id' => $this->integer()->notNull(),
            'article_id' => $this->integer(),
            'create_at' => $this->datetime(),
            'update_at' => $this->datetime(),
        ]);

        // creates index for column `is_available`
        $this->createIndex(
            '{{%idx-offer-is_available}}',
            '{{%offer}}',
            'is_available'
        );

        // creates index for column `name`
        $this->createIndex(
            '{{%idx-offer-name}}',
            '{{%offer}}',
            'name'
        );

        // creates index for column `price`
        $this->createIndex(
            '{{%idx-offer-price}}',
            '{{%offer}}',
            'price'
        );

        // creates index for column `price`
        $this->createIndex(
            '{{%idx-offer-article_id}}',
            '{{%offer}}',
            'article_id'
        );

        // creates index for column `merchant_id`
        $this->createIndex(
            '{{%idx-offer-merchant_id}}',
            '{{%offer}}',
            'merchant_id'
        );

        // add foreign key for table `{{%merchant}}`
        $this->addForeignKey(
            '{{%fk-offer-merchant_id}}',
            '{{%offer}}',
            'merchant_id',
            '{{%merchant}}',
            'id',
            'CASCADE'
        );

        // creates index for column `vendor_id`
        $this->createIndex(
            '{{%idx-offer-vendor_id}}',
            '{{%offer}}',
            'vendor_id'
        );

        // add foreign key for table `{{%vendor}}`
        $this->addForeignKey(
            '{{%fk-offer-vendor_id}}',
            '{{%offer}}',
            'vendor_id',
            '{{%vendor}}',
            'id',
            'CASCADE'
        );

        // creates index for column `currency_id`
        $this->createIndex(
            '{{%idx-offer-currency_id}}',
            '{{%offer}}',
            'currency_id'
        );

        // add foreign key for table `{{%currency}}`
        $this->addForeignKey(
            '{{%fk-offer-currency_id}}',
            '{{%offer}}',
            'currency_id',
            '{{%currency}}',
            'id',
            'CASCADE'
        );

        // creates index for column `category_id`
        $this->createIndex(
            '{{%idx-offer-category_id}}',
            '{{%offer}}',
            'category_id'
        );

        // add foreign key for table `{{%category}}`
        $this->addForeignKey(
            '{{%fk-offer-category_id}}',
            '{{%offer}}',
            'category_id',
            '{{%category}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops index for column `is_available`
        $this->dropIndex(
            '{{%idx-offer-is_available}}',
            '{{%offer}}'
        );

        // drops index for column `name`
        $this->dropIndex(
            '{{%idx-offer-name}}',
            '{{%offer}}'
        );

        // drops index for column `price`
        $this->dropIndex(
            '{{%idx-offer-price}}',
            '{{%offer}}'
        );

        // drops index for column `price`
        $this->dropIndex(
            '{{%idx-offer-article_id}}',
            '{{%offer}}'
        );

        // drops foreign key for table `{{%merchant}}`
        $this->dropForeignKey(
            '{{%fk-offer-merchant_id}}',
            '{{%offer}}'
        );

        // drops index for column `merchant_id`
        $this->dropIndex(
            '{{%idx-offer-merchant_id}}',
            '{{%offer}}'
        );

        // drops foreign key for table `{{%vendor}}`
        $this->dropForeignKey(
            '{{%fk-offer-vendor_id}}',
            '{{%offer}}'
        );

        // drops index for column `vendor_id`
        $this->dropIndex(
            '{{%idx-offer-vendor_id}}',
            '{{%offer}}'
        );

        // drops foreign key for table `{{%currency}}`
        $this->dropForeignKey(
            '{{%fk-offer-currency_id}}',
            '{{%offer}}'
        );

        // drops index for column `currency_id`
        $this->dropIndex(
            '{{%idx-offer-currency_id}}',
            '{{%offer}}'
        );

        // drops foreign key for table `{{%category}}`
        $this->dropForeignKey(
            '{{%fk-offer-category_id}}',
            '{{%offer}}'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            '{{%idx-offer-category_id}}',
            '{{%offer}}'
        );

        $this->dropTable('{{%offer}}');
    }
}
