<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%manga_categorie}}`.
 */
class m201016_000004_create_manga_categorie_table extends Migration
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

        $this->createTable('{{%manga_categorie}}', [
            'Categorie_Id' => $this->integer()->notNull(),
            'Manga_Id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('fk_manga_categorie_categorie', 'manga_categorie', 'Categorie_Id', 'categorie', 'IdCategorie');
        $this->addForeignKey('fk_manga_categorie_manga', 'manga_categorie', 'Manga_Id', 'manga', 'IdManga');
        
        $this->addPrimaryKey('pk_manga_categorie', 'manga_categorie', ['Categorie_Id', 'Manga_Id']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%manga_categorie}}');
    }
}
