<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default LDAP Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the LDAP connections below you wish
    | to use as your default connection for all LDAP operations. Of
    | course you may add as many connections you'd like below.
    |
    */

    'default' => env('LDAP_CONNECTION', 'default'),

    /*
    |--------------------------------------------------------------------------
    | LDAP Connections
    |--------------------------------------------------------------------------
    |
    | Below you may configure each LDAP connection your application requires
    | access to. Be sure to include a valid base DN - otherwise you may
    | not receive any results when performing LDAP search operations.
    |
    */

    'connections' => [

        'default' => [
            'hosts' => [env('LDAP_HOST', '192.168.5.10')],
            'username' => env('LDAP_USERNAME', 'cn=dev-one, cn=users, dc=ivt, dc=com'),
            'password' => env('LDAP_PASSWORD', 'P@ssw0rd'),
            'port' => env('LDAP_PORT', 389),
            'base_dn' => env('LDAP_BASE_DN', 'dc=ivt,dc=com'),
            'timeout' => env('LDAP_TIMEOUT', 5),
            'use_ssl' => env('LDAP_SSL', false),
            'use_tls' => env('LDAP_TLS', false),
        ],

        /* OPEN LDAP */
        // 'default' => [
        //     'hosts' => [env('LDAP_HOST', 'ldap.forumsys.com')],
        //     'username' => env('LDAP_USERNAME', null),
        //     'password' => env('LDAP_PASSWORD', null),
        //     'port' => env('LDAP_PORT', 389),
        //     'base_dn' => env('LDAP_BASE_DN', 'dc=example,dc=com'),
        //     'timeout' => env('LDAP_TIMEOUT', 5),
        //     'use_ssl' => env('LDAP_SSL', false),
        //     'use_tls' => env('LDAP_TLS', false),
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | LDAP Logging
    |--------------------------------------------------------------------------
    |
    | When LDAP logging is enabled, all LDAP search and authentication
    | operations are logged using the default application logging
    | driver. This can assist in debugging issues and more.
    |
    */

    'logging' => env('LDAP_LOGGING', true),

    /*
    |--------------------------------------------------------------------------
    | LDAP Cache
    |--------------------------------------------------------------------------
    |
    | LDAP caching enables the ability of caching search results using the
    | query builder. This is great for running expensive operations that
    | may take many seconds to complete, such as a pagination request.
    |
    */

    'cache' => [
        'enabled' => env('LDAP_CACHE', false),
        'driver' => env('CACHE_DRIVER', 'file'),
    ],

];
