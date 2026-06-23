<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%car}}`.
 */
class m260623_093313_create_car_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%car}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->text()->notNull(),
            'price' => $this->decimal(12,2)->notNull(),
            'photo_url' => $this->string()->notNull(),
            'contacts' => $this->string()->notNull(),
            'created_at' => $this->timestamp()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%car}}');
    }
}
