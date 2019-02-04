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

    'CLOUDFLARE_ZONE'=>env('CLOUDFLARE_ZONE', false),
    'CLOUDFLARE_API'=>env('CLOUDFLARE_API', false),
    'CLOUDFLARE_EMAIL'=>env('CLOUDFLARE_EMAIL', 'example@example.com'),
];
