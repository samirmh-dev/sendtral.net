<?php
/**
 * Created by PhpStorm.
 * User: Samir
 * Date: 04.02.2019
 * Time: 16:37
 */

return [
    'TENANT_DOMAIN' => env('TENANT_DOMAIN', 'sendtral.com'),
    'TENANT_HOST' => env('TENANT_HOST', 'localhost'),

    'permissions'=> [
        'defaults'=>'Scheduling / Defaults',
        'open-shifts'=>'Scheduling / Open shifts',
    ]
];
