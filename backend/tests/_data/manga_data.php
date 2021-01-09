<?php
use common\models\User;

return [
    [
        'Title' => 'Title number 1', 
        'OriginalTitle' => 'Original Title number 1', 
        'ReleaseDate' => '1998-11-12', 
        'Description' => 'Description number 1', 
        'Manager_Id' => User::find()->where('Username like "%Nildgar%"')->one()->manager->IdManager,
    ],
];
