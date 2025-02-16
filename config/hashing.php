<?php

return [
    'default' => env('HASH_DRIVER', 'argon2id'), 

    'bcrypt' => [
        'rounds' => env('BCRYPT_ROUNDS', 14), 
    ],

    'argon' => [
        'memory' => 4096, 
        'threads' => 2,
        'time' => 6,
    ],

    'rehash_on_login' => true, 
];
