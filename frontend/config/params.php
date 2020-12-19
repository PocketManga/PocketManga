<?php
$Dictionary = frontend\controllers\DictionaryController::getDictionary_en_US();
return [
    'adminEmail' => 'admin@example.com',
    'Dictionary' => $Dictionary,
];
