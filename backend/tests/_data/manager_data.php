<?php
use common\models\User;

return [
    [
        'Theme' => true,
        'User_Id' => User::find()->where('Username like "%Nildgar%"')->one()->IdUser,
    ],
];
