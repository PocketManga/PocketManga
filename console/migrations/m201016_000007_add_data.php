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
        /**/
        //-----------------------------------------------------------------------------------------Category----------------------// 
        $this->insert('{{%category}}', [
            'Name' => 'Action',
            'Slug' => 'Action',
        ]);
        $this->insert('{{%category}}', [
            'Name' => 'Romance',
            'Slug' => 'Romance',
        ]);
        
        //-----------------------------------------------------------------------------------------User--------------------------// 
        $password = Yii::$app->getSecurity()->generatePasswordHash('admin');
        $this->insert('{{%user}}', [
            'Username' => 'Nildgar',
            'Email' => 'nill546@hotmail.com',
            'Genre' => 'M',
            'BirthDate' => date('Y-m-d',strtotime('12/17/1997')),
            'Slug' => 'Nildgar',
            'auth_key' => $password,
            'password_hash' => strtoupper(Yii::$app->security->generateRandomString(5)),
        ]);
        
        //-----------------------------------------------------------------------------------------Manager-----------------------// 
        $this->insert('{{%manager}}', [
            'Permission' => '1',
            'User_Id' => 1,
        ]);

        //-----------------------------------------------------------------------------------------Manga+Chapter-----------------// 
        $this->insert('{{%manga}}', [
            'Title' => '1 X 1/2',
            'OriginalTitle' => '1 X 1/2',
            'SrcImage' => '/mangas/1/cover_image_1.jpg',
            'ReleaseDate' => date('Y-m-d',strtotime('10/16/2003')),
            'Description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et 
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
            'Manager_Id' => 1,
            'Slug' => '1 X 1/2',
        ]);
        for($i = 1; $i <= 17; $i++){
            $this->insert('{{%chapter}}', [
                'Number' => $i,
                'Season' => 1,
                'SrcFolder' => '/manga/1/'.$i,
                'Manga_Id' => 1,
                'Manager_Id' => 1,
                'Slug' => '1-Chapter '.$i,
            ]);
        }

        //___________________________________//
        $this->insert('{{%manga}}', [
            'Title' => 'Ane Naru Mono',
            'OriginalTitle' => 'Ane Naru Mono',
            'SrcImage' => '/mangas/2/cover_image_2.jpg',
            'ReleaseDate' => date('Y-m-d',strtotime('10/24/2009')),
            'Description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et 
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
            'Manager_Id' => 1,
            'Slug' => "Ane Naru Mono",
        ]);
        $this->insert('{{%chapter}}', [
            'Number' => 24,
            'Season' => 1,
            'SrcFolder' => '/manga/2/24',
            'Manga_Id' => 2,
            'Manager_Id' => 1,
            'Slug' => '2-Chapter 24',
        ]);
        
        //___________________________________//
        $this->insert('{{%manga}}', [
            'Title' => 'Asagao To Kase-san',
            'OriginalTitle' => 'Asagao To Kase-san',
            'SrcImage' => '/mangas/3/cover_image_3.jpg',
            'ReleaseDate' => date('Y-m-d',strtotime('10/16/2003')),
            'Description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et 
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
            'Manager_Id' => 1,
            'Slug' => 'Asagao To Kase-san',
        ]);
        for($i = 11; $i <= 30; $i++){
            $this->insert('{{%chapter}}', [
                'Number' => $i,
                'Season' => 1,
                'SrcFolder' => '/manga/3/'.$i,
                'Manga_Id' => 3,
                'Manager_Id' => 1,
                'Slug' => '3-Chapter '.$i,
            ]);
        }
        
        //___________________________________//
        $this->insert('{{%manga}}', [
            'Title' => 'Asa Made Jugyou Chu',
            'OriginalTitle' => 'Asa Made Jugyou Chu',
            'SrcImage' => '/mangas/4/cover_image_4.jpg',
            'ReleaseDate' => date('Y-m-d',strtotime('10/16/2003')),
            'Description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et 
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
            'Manager_Id' => 1,
            'Slug' => 'Asa Made Jugyou Chu',
        ]);
        for($i = 1; $i <= 26; $i++){
            $this->insert('{{%chapter}}', [
                'Number' => $i,
                'Season' => 1,
                'SrcFolder' => '/manga/4/'.$i,
                'Manga_Id' => 4,
                'Manager_Id' => 1,
                'Slug' => '4-Chapter '.$i,
            ]);
        }
        
        //___________________________________//
        $this->insert('{{%manga}}', [
            'Title' => 'Berserk Of Gluttony',
            'OriginalTitle' => 'Berserk Of Gluttony',
            'SrcImage' => '/mangas/5/cover_image_5.jpg',
            'ReleaseDate' => date('Y-m-d',strtotime('10/16/2003')),
            'Description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et 
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
            'Manager_Id' => 1,
            'Slug' => 'Berserk Of Gluttony',
        ]);
        for($i = 11; $i <= 12; $i++){
            $this->insert('{{%chapter}}', [
                'Number' => $i,
                'Season' => 1,
                'SrcFolder' => '/manga/5/'.$i,
                'Manga_Id' => 5,
                'Manager_Id' => 1,
                'Slug' => '5-Chapter '.$i,
            ]);
        }
        
        //___________________________________//
        $this->insert('{{%manga}}', [
            'Title' => 'Bocchi Na Bokura No Renai Jijou',
            'OriginalTitle' => 'Bocchi Na Bokura No Renai Jijou',
            'SrcImage' => '/mangas/6/cover_image_6.jpg',
            'ReleaseDate' => date('Y-m-d',strtotime('10/16/2003')),
            'Description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et 
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
            'Manager_Id' => 1,
            'Slug' => 'Bocchi Na Bokura No Renai Jijou',
        ]);
        for($i = 1; $i <= 14; $i++){
            $this->insert('{{%chapter}}', [
                'Number' => $i,
                'Season' => 1,
                'SrcFolder' => '/manga/6/'.$i,
                'Manga_Id' => 6,
                'Manager_Id' => 1,
                'Slug' => '6-Chapter '.$i,
            ]);
        }
        
        //___________________________________//
        $this->insert('{{%manga}}', [
            'Title' => 'Hana-kun To Koisuru Watashi',
            'OriginalTitle' => 'Hana-kun To Koisuru Watashi',
            'SrcImage' => '/mangas/7/cover_image_7.jpg',
            'ReleaseDate' => date('Y-m-d',strtotime('10/16/2003')),
            'Description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et 
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
            'Manager_Id' => 1,
            'Slug' => 'Hana-kun To Koisuru Watashi',
        ]);
        for($i = 1; $i <= 42; $i++){
            $this->insert('{{%chapter}}', [
                'Number' => $i,
                'Season' => 1,
                'SrcFolder' => '/manga/7/'.$i,
                'Manga_Id' => 7,
                'Manager_Id' => 1,
                'Slug' => '7-Chapter '.$i,
            ]);
        }
        
        //___________________________________//
        $this->insert('{{%manga}}', [
            'Title' => 'Handsome And Cute',
            'OriginalTitle' => 'Handsome And Cute',
            'SrcImage' => '/mangas/8/cover_image_8.jpg',
            'ReleaseDate' => date('Y-m-d',strtotime('10/16/2003')),
            'Description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et 
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
            'Manager_Id' => 1,
            'Slug' => 'Handsome And Cute',
        ]);
        for($i = 11; $i <= 12; $i++){
            $this->insert('{{%chapter}}', [
                'Number' => $i,
                'Season' => 1,
                'SrcFolder' => '/manga/8/'.$i,
                'Manga_Id' => 8,
                'Manager_Id' => 1,
                'Slug' => '8-Chapter '.$i,
            ]);
        }
        
        //___________________________________//
        $this->insert('{{%manga}}', [
            'Title' => 'Her Shim-Cheong',
            'OriginalTitle' => 'Her Shim-Cheong',
            'SrcImage' => '/mangas/9/cover_image_9.jpg',
            'ReleaseDate' => date('Y-m-d',strtotime('10/16/2003')),
            'Description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et 
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
            'Manager_Id' => 1,
            'Slug' => 'Her Shim-Cheong',
        ]);
        for($i = 52; $i <= 54; $i++){
            $this->insert('{{%chapter}}', [
                'Number' => $i,
                'Season' => 1,
                'SrcFolder' => '/manga/9/'.$i,
                'Manga_Id' => 9,
                'Manager_Id' => 1,
                'Slug' => '9-Chapter '.$i,
            ]);
        }
        
        //___________________________________//
        $this->insert('{{%manga}}', [
            'Title' => 'Honzuki No Gekokujou',
            'OriginalTitle' => 'Honzuki No Gekokujou',
            'SrcImage' => '/mangas/10/cover_image_10.jpg',
            'ReleaseDate' => date('Y-m-d',strtotime('10/16/2003')),
            'Description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et 
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
            'Manager_Id' => 1,
            'Slug' => 'Honzuki No Gekokujou',
        ]);
        for($i = 14; $i <= 15; $i++){
            $this->insert('{{%chapter}}', [
                'Number' => $i,
                'Season' => 1,
                'SrcFolder' => '/manga/10/'.$i,
                'Manga_Id' => 10,
                'Manager_Id' => 1,
                'Slug' => '10-Chapter '.$i,
            ]);
        }
        
        //___________________________________//
        $this->insert('{{%manga}}', [
            'Title' => 'Isekai De Kuro No Iyashi Te Tte Yobarete Imasu',
            'OriginalTitle' => 'Isekai De Kuro No Iyashi Te Tte Yobarete Imasu',
            'SrcImage' => '/mangas/11/cover_image_11.jpg',
            'ReleaseDate' => date('Y-m-d',strtotime('10/16/2003')),
            'Description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et 
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
            'Manager_Id' => 1,
            'Slug' => 'Isekai De Kuro No Iyashi Te Tte Yobarete Imasu',
        ]);
        for($i = 1; $i <= 11; $i++){
            $this->insert('{{%chapter}}', [
                'Number' => $i,
                'Season' => 1,
                'SrcFolder' => '/manga/11/'.$i,
                'Manga_Id' => 11,
                'Manager_Id' => 1,
                'Slug' => '11-Chapter '.$i,
            ]);
        }
        
        //___________________________________//
        $this->insert('{{%manga}}', [
            'Title' => 'Its My Life',
            'OriginalTitle' => 'Its My Life',
            'SrcImage' => '/mangas/12/cover_image_12.jpg',
            'ReleaseDate' => date('Y-m-d',strtotime('10/16/2003')),
            'Description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et 
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
            'Manager_Id' => 1,
            'Slug' => 'Its My Life',
        ]);
        for($i = 1; $i <= 43; $i++){
            $this->insert('{{%chapter}}', [
                'Number' => $i,
                'Season' => 1,
                'SrcFolder' => '/manga/12/'.$i,
                'Manga_Id' => 12,
                'Manager_Id' => 1,
                'Slug' => '12-Chapter '.$i,
            ]);
        }

        /**/
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
