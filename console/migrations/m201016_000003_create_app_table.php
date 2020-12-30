<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%app}}`.
 */
class m201016_000003_create_app_table extends Migration
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

        $this->createTable('{{%app}}', [
            'IdApp' => $this->primaryKey(),
            'Theme' => $this->boolean()->notNull()->defaultValue(1),
            'MangaShow' => $this->boolean()->notNull()->defaultValue(0),
            'ChapterShow' => $this->boolean()->notNull()->defaultValue(1),
            'Server' => $this->string(10)->notNull()->defaultValue('en_US'),
            'Leitor_Id' => $this->integer()->notNull()->unique(),
        ], $tableOptions);

        $this->addForeignKey('fk_app_leitor', 'app', 'Leitor_Id', 'leitor', 'IdLeitor');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%app}}');
    }
}
