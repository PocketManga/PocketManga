<?php
$Dictionary = frontend\controllers\DictionaryController::getDictionary_En_us();
return [
    'adminEmail' => 'admin@example.com',
    'Dictionary' => $Dictionary,
];
