<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Configuração dos administradores do sistema
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
 */
    'admins' => env('CODPES_ADMINS', false),
    'vinculos' => env('VINCULOS_ACEITOS', false)
];