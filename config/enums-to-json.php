<?php

// config for SassLaravel/LaravelEnumsToJson
return [
    'enum_locations'=>[
        app_path()
    ],
    // The disk, defined in filesystem.php where json files will be stored
    'disk'=>'public',

    // Folder on which the json files will be generated
    'path'=>'/shared'
];
