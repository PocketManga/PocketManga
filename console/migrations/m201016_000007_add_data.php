<?php

use yii\db\Migration;

/**
 * Class m201016_000007_add_data
 */
class m201016_000007_add_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('{{%category}}', [
            'Name' => 'Action',
            'Slug' => 'Action',
        ]);
        $this->insert('{{%category}}', [
            'Name' => 'Romance',
            'Slug' => 'Romance',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201016_000007_add_data cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201016_000007_add_data cannot be reverted.\n";

        return false;
    }
    */
}
