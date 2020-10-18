<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%rating}}`.
 */
class m201016_000004_create_rating_table extends Migration
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

        $this->createTable('{{%rating}}', [
            'User_Id' => $this->integer()->notNull(),
            'Manga_Id' => $this->integer()->notNull(),
            'Stars' => $this->integer()->notNull()->defaultValue(0),
        ], $tableOptions);

        $this->addForeignKey('fk_rating_user', 'rating', 'User_Id', 'user', 'IdUser');
        $this->addForeignKey('fk_rating_manga', 'rating', 'Manga_Id', 'manga', 'IdManga');
        
        $this->addPrimaryKey('pk_rating', 'rating', ['User_Id', 'Manga_Id']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%rating}}');
    }
}
