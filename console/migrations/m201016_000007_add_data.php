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
            //'Slug' => 'Action',
        ]);

        $this->insert('{{%category}}', [
            'Name' => 'Romance',
            //'Slug' => 'Romance',
        ]);

        $this->insert('{{%category}}', [
            'Name' => 'Yuri',
            //'Slug' => 'Yuri',
        ]);

        $this->insert('{{%category}}', [
            'Name' => 'Adventure',
            //'Slug' => 'Adventure',
        ]);

        $this->insert('{{%category}}', [
            'Name' => 'Isekai',
            //'Slug' => 'Isekai',
        ]);

        $this->insert('{{%category}}', [
            'Name' => 'Fantasy',
            //'Slug' => 'Fantasy',
        ]);
        
        //-----------------------------------------------------------------------------------------User--------------------------// 
        $password = Yii::$app->getSecurity()->generatePasswordHash('admin');
        $this->insert('{{%user}}', [
            'Username' => 'Nildgar',
            'Email' => 'nill546@hotmail.com',
            'Genre' => 'M',
            'BirthDate' => date('Y-m-d',strtotime('12/17/1997')),
            //'Slug' => 'Nildgar',
            'auth_key' => $password,
            'password_hash' => Yii::$app->security->generatePasswordHash('admin'),//strtoupper(Yii::$app->security->generateRandomString(5)),
        ]);

        $password = Yii::$app->getSecurity()->generatePasswordHash('admin');
        $this->insert('{{%user}}', [
            'Username' => 'Popcorn',
            'Email' => 'nex543@hotmail.com',
            'Genre' => 'F',
            'BirthDate' => date('Y-m-d',strtotime('10/30/1999')),
            //'Slug' => 'Popcorn',
            'auth_key' => $password,
            'password_hash' => Yii::$app->security->generatePasswordHash('admin'),//strtoupper(Yii::$app->security->generateRandomString(5)),
        ]);
        
        //-----------------------------------------------------------------------------------------Manager-----------------------// 
        $this->insert('{{%manager}}', [
            'User_Id' => 1,
            'Theme' => 1,
        ]);
        
        //-----------------------------------------------------------------------------------------Leitor------------------------// 
        $this->insert('{{%leitor}}', [
            'MangaShow' => '1',
            //'LibraryShow' => '1',
            'User_Id' => 1,
        ]);

        $this->insert('{{%leitor}}', [
            'MangaShow' => '1',
            //'LibraryShow' => '1',
            'User_Id' => 2,
        ]);

        //-----------------------------------------------------------------------------------------Author------------------------// 
        $this->insert('{{%author}}', [
            'FirstName' => 'Nildgar',
            //'Slug' => 'Nildgar',
        ]);
        
        $this->insert('{{%author}}', [
            'FirstName' => 'Mikoto',
            //'Slug' => 'Mikoto',
        ]);

        $this->insert('{{%author}}', [
            'FirstName' => 'Mashiro',
            'LastName' => 'Shiro',
            //'Slug' => 'Mashiro',
        ]);

        //-----------------------------------------------------------------------------------------Manga+Chapter-----------------// 
        $this->insert('{{%manga}}', [
            'Title' => '1 X 1/2',
            'OriginalTitle' => '1 X 1/2',
            'R18' => true,
            'SrcImage' => '/mangas/1/cover_image_1.jpg',
            'ReleaseDate' => date('Y-m-d',strtotime('10/16/2003')),
            'Description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et 
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
            'Manager_Id' => 1,
            //'Slug' => '1 X 1/2',
        ]);
        $this->insert('{{%chapter}}', [
            'Number' => 1,
            'Season' => 1,
            'PagesNumber' => 6,
            'SrcFolder' => '/mangas/1/1',
            'Manga_Id' => 1,
            'Manager_Id' => 1,
            //'Slug' => '1-Chapter 1',
        ]);
        $this->insert('{{%chapter}}', [
            'Number' => 2,
            'Season' => 1,
            'PagesNumber' => 19,
            'SrcFolder' => '/mangas/1/2',
            'Manga_Id' => 1,
            'Manager_Id' => 1,
            //'Slug' => '1-Chapter 2',
        ]);
        $this->insert('{{%chapter}}', [
            'Number' => 3,
            'Season' => 1,
            'PagesNumber' => 11,
            'SrcFolder' => '/mangas/1/3',
            'Manga_Id' => 1,
            'Manager_Id' => 1,
            //'Slug' => '1-Chapter 3',
        ]);
        $this->insert('{{%chapter}}', [
            'Number' => 4,
            'Season' => 1,
            'PagesNumber' => 19,
            'SrcFolder' => '/mangas/1/4',
            'Manga_Id' => 1,
            'Manager_Id' => 1,
            //'Slug' => '1-Chapter 4',
        ]);
        $this->insert('{{%chapter}}', [
            'Number' => 5,
            'Season' => 1,
            'PagesNumber' => 4,
            'SrcFolder' => '/mangas/1/5',
            'Manga_Id' => 1,
            'Manager_Id' => 1,
            //'Slug' => '1-Chapter 5',
        ]);
        $this->insert('{{%chapter}}', [
            'Number' => 6,
            'Season' => 1,
            'PagesNumber' => 18,
            'SrcFolder' => '/mangas/1/6',
            'Manga_Id' => 1,
            'Manager_Id' => 1,
            //'Slug' => '1-Chapter 6',
        ]);
        $this->insert('{{%chapter}}', [
            'Number' => 7,
            'Season' => 1,
            'PagesNumber' => 6,
            'SrcFolder' => '/mangas/1/7',
            'Manga_Id' => 1,
            'Manager_Id' => 1,
            //'Slug' => '1-Chapter 7',
        ]);
        $this->insert('{{%chapter}}', [
            'Number' => 8,
            'Season' => 1,
            'PagesNumber' => 33,
            'SrcFolder' => '/mangas/1/8',
            'Manga_Id' => 1,
            'Manager_Id' => 1,
            //'Slug' => '1-Chapter 8',
        ]);
        $this->insert('{{%chapter}}', [
            'Number' => 9,
            'Season' => 1,
            'PagesNumber' => 27,
            'SrcFolder' => '/mangas/1/9',
            'Manga_Id' => 1,
            'Manager_Id' => 1,
            //'Slug' => '1-Chapter 9',
        ]);
        $this->insert('{{%chapter}}', [
            'Number' => 10,
            'Season' => 1,
            'PagesNumber' => 9,
            'SrcFolder' => '/mangas/1/10',
            'Manga_Id' => 1,
            'Manager_Id' => 1,
            //'Slug' => '1-Chapter 10',
        ]);
        $this->insert('{{%chapter}}', [
            'Number' => 11,
            'Season' => 1,
            'PagesNumber' => 27,
            'SrcFolder' => '/mangas/1/11',
            'Manga_Id' => 1,
            'Manager_Id' => 1,
            //'Slug' => '1-Chapter 11',
        ]);
        $this->insert('{{%chapter}}', [
            'Number' => 12,
            'Season' => 1,
            'PagesNumber' => 34,
            'SrcFolder' => '/mangas/1/12',
            'Manga_Id' => 1,
            'Manager_Id' => 1,
            //'Slug' => '1-Chapter 12',
        ]);
        $this->insert('{{%chapter}}', [
            'Number' => 13,
            'Season' => 1,
            'PagesNumber' => 8,
            'SrcFolder' => '/mangas/1/13',
            'Manga_Id' => 1,
            'Manager_Id' => 1,
            //'Slug' => '1-Chapter 13',
        ]);
        $this->insert('{{%chapter}}', [
            'Number' => 14,
            'Season' => 1,
            'PagesNumber' => 12,
            'SrcFolder' => '/mangas/1/14',
            'Manga_Id' => 1,
            'Manager_Id' => 1,
            //'Slug' => '1-Chapter 14',
        ]);
        $this->insert('{{%chapter}}', [
            'Number' => 15,
            'Season' => 1,
            'PagesNumber' => 6,
            'SrcFolder' => '/mangas/1/15',
            'Manga_Id' => 1,
            'Manager_Id' => 1,
            //'Slug' => '1-Chapter 15',
        ]);
        $this->insert('{{%chapter}}', [
            'Number' => 16,
            'Season' => 1,
            'PagesNumber' => 26,
            'SrcFolder' => '/mangas/1/16',
            'Manga_Id' => 1,
            'Manager_Id' => 1,
            //'Slug' => '1-Chapter 16',
        ]);
        $this->insert('{{%chapter}}', [
            'Number' => 17,
            'Season' => 1,
            'PagesNumber' => 26,
            'SrcFolder' => '/mangas/1/17',
            'Manga_Id' => 1,
            'Manager_Id' => 1,
            //'Slug' => '1-Chapter 17',
        ]);
        $this->insert('{{%manga_author}}', [
            'Author_Id' => 3,
            'Manga_Id' => 1,
        ]);

        //___________________________________//
        $this->insert('{{%manga}}', [
            'Title' => 'Ane Naru Mono',
            'OriginalTitle' => 'Ane Naru Mono',
            'R18' => true,
            'SrcImage' => '/mangas/2/cover_image_2.jpg',
            'ReleaseDate' => date('Y-m-d',strtotime('10/24/2009')),
            'Description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et 
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
            'Manager_Id' => 1,
            //'Slug' => "Ane Naru Mono",
        ]);
        $this->insert('{{%chapter}}', [
            'Number' => 24,
            'Season' => 1,
            'PagesNumber' => 17,
            'SrcFolder' => '/mangas/2/24',
            'Manga_Id' => 2,
            'Manager_Id' => 1,
            //'Slug' => '2-Chapter 24',
        ]);
        $this->insert('{{%manga_author}}', [
            'Author_Id' => 2,
            'Manga_Id' => 2,
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
            //'Slug' => 'Asagao To Kase-san',
        ]);
        for($i = 11; $i <= 30; $i++){
            $this->insert('{{%chapter}}', [
                'Number' => $i,
                'Season' => 1,
                'PagesNumber' => 19,
                'SrcFolder' => '/mangas/3/'.$i,
                'Manga_Id' => 3,
                'Manager_Id' => 1,
                //'Slug' => '3-Chapter '.$i,
            ]);
        }
        $this->insert('{{%manga_author}}', [
            'Author_Id' => 3,
            'Manga_Id' => 3,
        ]);
        
        //___________________________________//
        $this->insert('{{%manga}}', [
            'Title' => 'Asa Made Jugyou Chu',
            'OriginalTitle' => 'Asa Made Jugyou Chu',
            'R18' => true,
            'Status' => true,
            'SrcImage' => '/mangas/4/cover_image_4.jpg',
            'ReleaseDate' => date('Y-m-d',strtotime('10/16/2003')),
            'Description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et 
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
            'Manager_Id' => 1,
            //'Slug' => 'Asa Made Jugyou Chu',
        ]);
        for($i = 1; $i <= 26; $i++){
            $this->insert('{{%chapter}}', [
                'Number' => $i,
                'Season' => 1,
                'PagesNumber' => 10,
                'SrcFolder' => '/mangas/4/'.$i,
                'Manga_Id' => 4,
                'Manager_Id' => 1,
                //'Slug' => '4-Chapter '.$i,
            ]);
        }
        $this->insert('{{%manga_author}}', [
            'Author_Id' => 1,
            'Manga_Id' => 4,
        ]);
        
        //___________________________________//
        $this->insert('{{%manga}}', [
            'Title' => 'Berserk Of Gluttony',
            'OriginalTitle' => 'Berserk Of Gluttony',
            'Status' => true,
            'SrcImage' => '/mangas/5/cover_image_5.jpg',
            'ReleaseDate' => date('Y-m-d',strtotime('10/16/2003')),
            'Description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et 
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
            'Manager_Id' => 1,
            //'Slug' => 'Berserk Of Gluttony',
        ]);
        for($i = 11; $i <= 12; $i++){
            $this->insert('{{%chapter}}', [
                'Number' => $i,
                'Season' => 1,
                'PagesNumber' => 29,
                'SrcFolder' => '/mangas/5/'.$i,
                'Manga_Id' => 5,
                'Manager_Id' => 1,
                //'Slug' => '5-Chapter '.$i,
            ]);
        }
        $this->insert('{{%manga_author}}', [
            'Author_Id' => 2,
            'Manga_Id' => 5,
        ]);
        
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
            //'Slug' => 'Bocchi Na Bokura No Renai Jijou',
        ]);
        for($i = 1; $i <= 14; $i++){
            $this->insert('{{%chapter}}', [
                'Number' => $i,
                'Season' => 1,
                'PagesNumber' => 10,
                'SrcFolder' => '/mangas/6/'.$i,
                'Manga_Id' => 6,
                'Manager_Id' => 1,
                //'Slug' => '6-Chapter '.$i,
            ]);
        }
        $this->insert('{{%manga_author}}', [
            'Author_Id' => 1,
            'Manga_Id' => 6,
        ]);
        
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
            //'Slug' => 'Hana-kun To Koisuru Watashi',
        ]);
        for($i = 1; $i <= 42; $i++){
            $this->insert('{{%chapter}}', [
                'Number' => $i,
                'Season' => 1,
                'PagesNumber' => 10,
                'SrcFolder' => '/mangas/7/'.$i,
                'Manga_Id' => 7,
                'Manager_Id' => 1,
                //'Slug' => '7-Chapter '.$i,
            ]);
        }
        $this->insert('{{%manga_author}}', [
            'Author_Id' => 1,
            'Manga_Id' => 7,
        ]);
        
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
            //'Slug' => 'Handsome And Cute',
        ]);
        for($i = 11; $i <= 12; $i++){
            $this->insert('{{%chapter}}', [
                'Number' => $i,
                'Season' => 1,
                'PagesNumber' => 7,
                'SrcFolder' => '/mangas/8/'.$i,
                'Manga_Id' => 8,
                'Manager_Id' => 1,
                //'Slug' => '8-Chapter '.$i,
            ]);
        }
        $this->insert('{{%manga_author}}', [
            'Author_Id' => 3,
            'Manga_Id' => 8,
        ]);
        
        //___________________________________//
        $this->insert('{{%manga}}', [
            'Title' => 'Her Shim-Cheong',
            'OriginalTitle' => 'Her Shim-Cheong',
            'Status' => true,
            'SrcImage' => '/mangas/9/cover_image_9.jpg',
            'ReleaseDate' => date('Y-m-d',strtotime('10/16/2003')),
            'Description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et 
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
            'Manager_Id' => 1,
            //'Slug' => 'Her Shim-Cheong',
        ]);
        for($i = 52; $i <= 54; $i++){
            $this->insert('{{%chapter}}', [
                'Number' => $i,
                'Season' => 1,
                'PagesNumber' => 7,
                'SrcFolder' => '/mangas/9/'.$i,
                'Manga_Id' => 9,
                'Manager_Id' => 1,
                //'Slug' => '9-Chapter '.$i,
            ]);
        }
        $this->insert('{{%manga_author}}', [
            'Author_Id' => 1,
            'Manga_Id' => 9,
        ]);
        
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
            //'Slug' => 'Honzuki No Gekokujou',
        ]);
        $this->insert('{{%chapter}}', [
            'Number' => 14,
            'Season' => 1,
            'PagesNumber' => 37,
            'SrcFolder' => '/mangas/10/14',
            'Manga_Id' => 10,
            'Manager_Id' => 1,
            //'Slug' => '10-Chapter 14',
        ]);
        $this->insert('{{%chapter}}', [
            'Number' => 15,
            'Season' => 1,
            'PagesNumber' => 15,
            'SrcFolder' => '/mangas/10/15',
            'Manga_Id' => 10,
            'Manager_Id' => 1,
            //'Slug' => '10-Chapter 15',
        ]);
        $this->insert('{{%manga_author}}', [
            'Author_Id' => 3,
            'Manga_Id' => 10,
        ]);
        
        //___________________________________//
        $this->insert('{{%manga}}', [
            'Title' => 'Isekai De Kuro No Iyashi Te Tte Yobarete Imasu',
            'OriginalTitle' => 'Isekai De Kuro No Iyashi Te Tte Yobarete Imasu',
            'Status' => true,
            'SrcImage' => '/mangas/11/cover_image_11.jpg',
            'ReleaseDate' => date('Y-m-d',strtotime('10/16/2003')),
            'Description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et 
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
            'Manager_Id' => 1,
            //'Slug' => 'Isekai De Kuro No Iyashi Te Tte Yobarete Imasu',
        ]);
        for($i = 1; $i <= 11; $i++){
            $this->insert('{{%chapter}}', [
                'Number' => $i,
                'Season' => 1,
                'PagesNumber' => 10,
                'SrcFolder' => '/mangas/11/'.$i,
                'Manga_Id' => 11,
                'Manager_Id' => 1,
                //'Slug' => '11-Chapter '.$i,
            ]);
        }
        $this->insert('{{%manga_author}}', [
            'Author_Id' => 2,
            'Manga_Id' => 11,
        ]);
        
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
            //'Slug' => 'Its My Life',
        ]);
        for($i = 1; $i <= 43; $i++){
            $this->insert('{{%chapter}}', [
                'Number' => $i,
                'Season' => 1,
                'PagesNumber' => 10,
                'SrcFolder' => '/mangas/12/'.$i,
                'Manga_Id' => 12,
                'Manager_Id' => 1,
                //'Slug' => '12-Chapter '.$i,
            ]);
        }
        $this->insert('{{%manga_author}}', [
            'Author_Id' => 3,
            'Manga_Id' => 12,
        ]);
        
        //-----------------------------------------------------------------------------------------Rating------------------------// 
        $this->insert('{{%rating}}', [
            'Manga_Id' => 1,
            'User_Id' => 1,
            'Stars' => 5,
        ]);

        $this->insert('{{%rating}}', [
            'Manga_Id' => 1,
            'User_Id' => 2,
            'Stars' => 4,
        ]);

        $this->insert('{{%rating}}', [
            'Manga_Id' => 3,
            'User_Id' => 2,
            'Stars' => 3,
        ]);

        $this->insert('{{%rating}}', [
            'Manga_Id' => 5,
            'User_Id' => 1,
            'Stars' => 5,
        ]);

        $this->insert('{{%rating}}', [
            'Manga_Id' => 3,
            'User_Id' => 1,
            'Stars' => 4,
        ]);

        $this->insert('{{%rating}}', [
            'Manga_Id' => 6,
            'User_Id' => 2,
            'Stars' => 4,
        ]);

        $this->insert('{{%rating}}', [
            'Manga_Id' => 6,
            'User_Id' => 1,
            'Stars' => 2,
        ]);

        $this->insert('{{%rating}}', [
            'Manga_Id' => 7,
            'User_Id' => 1,
            'Stars' => 5,
        ]);

        $this->insert('{{%rating}}', [
            'Manga_Id' => 7,
            'User_Id' => 2,
            'Stars' => 5,
        ]);

        $this->insert('{{%rating}}', [
            'Manga_Id' => 8,
            'User_Id' => 1,
            'Stars' => 4,
        ]);
        
        //-----------------------------------------------------------------------------------------Favorite-----------------------// 
        $this->insert('{{%favorite}}', [
            'Manga_Id' => 1,
            'Leitor_Id' => 1,
        ]);

        $this->insert('{{%favorite}}', [
            'Manga_Id' => 1,
            'Leitor_Id' => 2,
        ]);

        $this->insert('{{%favorite}}', [
            'Manga_Id' => 3,
            'Leitor_Id' => 2,
        ]);

        $this->insert('{{%favorite}}', [
            'Manga_Id' => 5,
            'Leitor_Id' => 1,
        ]);

        $this->insert('{{%favorite}}', [
            'Manga_Id' => 3,
            'Leitor_Id' => 1,
        ]);
        
        //-----------------------------------------------------------------------------------------Manga-Category-------------------// 
        $this->insert('{{%manga_category}}', [
            'Manga_Id' => 1,
            'Category_Id' => 2,
        ]);

        $this->insert('{{%manga_category}}', [
            'Manga_Id' => 1,
            'Category_Id' => 3,
        ]);

        $this->insert('{{%manga_category}}', [
            'Manga_Id' => 2,
            'Category_Id' => 2,
        ]);

        $this->insert('{{%manga_category}}', [
            'Manga_Id' => 2,
            'Category_Id' => 6,
        ]);

        $this->insert('{{%manga_category}}', [
            'Manga_Id' => 3,
            'Category_Id' => 2,
        ]);

        $this->insert('{{%manga_category}}', [
            'Manga_Id' => 3,
            'Category_Id' => 3,
        ]);

        $this->insert('{{%manga_category}}', [
            'Manga_Id' => 4,
            'Category_Id' => 2,
        ]);

        $this->insert('{{%manga_category}}', [
            'Manga_Id' => 5,
            'Category_Id' => 1,
        ]);

        $this->insert('{{%manga_category}}', [
            'Manga_Id' => 5,
            'Category_Id' => 2,
        ]);

        $this->insert('{{%manga_category}}', [
            'Manga_Id' => 5,
            'Category_Id' => 4,
        ]);

        $this->insert('{{%manga_category}}', [
            'Manga_Id' => 5,
            'Category_Id' => 6,
        ]);

        $this->insert('{{%manga_category}}', [
            'Manga_Id' => 6,
            'Category_Id' => 2,
        ]);

        $this->insert('{{%manga_category}}', [
            'Manga_Id' => 7,
            'Category_Id' => 2,
        ]);

        $this->insert('{{%manga_category}}', [
            'Manga_Id' => 8,
            'Category_Id' => 2,
        ]);

        $this->insert('{{%manga_category}}', [
            'Manga_Id' => 9,
            'Category_Id' => 4,
        ]);

        $this->insert('{{%manga_category}}', [
            'Manga_Id' => 10,
            'Category_Id' => 1,
        ]);

        $this->insert('{{%manga_category}}', [
            'Manga_Id' => 10,
            'Category_Id' => 2,
        ]);

        $this->insert('{{%manga_category}}', [
            'Manga_Id' => 10,
            'Category_Id' => 5,
        ]);

        $this->insert('{{%manga_category}}', [
            'Manga_Id' => 11,
            'Category_Id' => 2,
        ]);

        $this->insert('{{%manga_category}}', [
            'Manga_Id' => 11,
            'Category_Id' => 4,
        ]);

        $this->insert('{{%manga_category}}', [
            'Manga_Id' => 11,
            'Category_Id' => 5,
        ]);

        $this->insert('{{%manga_category}}', [
            'Manga_Id' => 12,
            'Category_Id' => 4,
        ]);

        $this->insert('{{%manga_category}}', [
            'Manga_Id' => 12,
            'Category_Id' => 6,
        ]);
        
        //-----------------------------------------------------------------------------------------Library-List---------------------// 
        $this->insert('{{%library_list}}', [
            'Name' => 'Wish',
        ]);

        $this->insert('{{%library_list}}', [
            'Name' => 'Reading',
        ]);

        $this->insert('{{%library_list}}', [
            'Name' => 'Following',
        ]);
        
        //-----------------------------------------------------------------------------------------Library--------------------------// 
        $this->insert('{{%library}}', [
            'Leitor_Id' => 1,
            'Manga_Id' => 1,
            'List_Id' => 4,
        ]);

        $this->insert('{{%library}}', [
            'Leitor_Id' => 1,
            'Manga_Id' => 2,
            'List_Id' => 3,
        ]);

        $this->insert('{{%library}}', [
            'Leitor_Id' => 1,
            'Manga_Id' => 3,
            'List_Id' => 4,
        ]);

        $this->insert('{{%library}}', [
            'Leitor_Id' => 1,
            'Manga_Id' => 4,
            'List_Id' => 4,
        ]);

        $this->insert('{{%library}}', [
            'Leitor_Id' => 1,
            'Manga_Id' => 5,
            'List_Id' => 1,
        ]);

        $this->insert('{{%library}}', [
            'Leitor_Id' => 1,
            'Manga_Id' => 6,
            'List_Id' => 2,
        ]);

        $this->insert('{{%library}}', [
            'Leitor_Id' => 1,
            'Manga_Id' => 7,
            'List_Id' => 1,
        ]);

        $this->insert('{{%library}}', [
            'Leitor_Id' => 1,
            'Manga_Id' => 8,
            'List_Id' => 3,
        ]);

        $this->insert('{{%library}}', [
            'Leitor_Id' => 1,
            'Manga_Id' => 9,
            'List_Id' => 1,
        ]);

        $this->insert('{{%library}}', [
            'Leitor_Id' => 1,
            'Manga_Id' => 10,
            'List_Id' => 2,
        ]);

        $this->insert('{{%library}}', [
            'Leitor_Id' => 1,
            'Manga_Id' => 11,
            'List_Id' => 3,
        ]);

        $this->insert('{{%library}}', [
            'Leitor_Id' => 1,
            'Manga_Id' => 12,
            'List_Id' => 3,
        ]);

        $this->insert('{{%library}}', [
            'Leitor_Id' => 2,
            'Manga_Id' => 1,
            'List_Id' => 2,
        ]);

        $this->insert('{{%library}}', [
            'Leitor_Id' => 2,
            'Manga_Id' => 2,
            'List_Id' => 2,
        ]);

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
