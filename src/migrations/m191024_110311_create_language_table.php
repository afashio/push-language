<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%language}}`.
 */
class m191024_110311_create_language_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%language}}', [
            'id' => $this->primaryKey(),
            'slug' => $this->string(6)->notNull()->unique(),
            'name' => $this->string(50)->notNull()->unique(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%language}}');
    }
}
