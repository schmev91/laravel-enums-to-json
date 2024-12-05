<?php

// config for SassLaravel/LaravelEnumsToJson
return [
    'enum_locations'=>[
        app_path()
    ],
    // The disk, defined in filesystem.php where json files will be stored
    'disk'=>'public',

    // Folder on which the json files will be generated
    'path'=>'/shared',

    // User related config incase you name User Entity something else, e.g. Customer
    "user_table"=> 'users',
    "user_model"=> 'App\\Models\\User'
];
