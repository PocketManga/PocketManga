<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%manager}}`.
 */
class m201016_000002_create_manager_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%manager}}', [
            'IdManager' => $this->primaryKey(),
            'Theme' => $this->boolean()->notNull()->defaultValue(0),
            'User_Id' => $this->integer()->notNull()->unique(),
        ], $tableOptions);

        $this->addForeignKey('fk_manager_user', 'manager', 'User_Id', 'user', 'IdUser');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%manager}}');
    }
}
