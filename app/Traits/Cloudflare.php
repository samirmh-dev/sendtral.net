<?php
/**
 * Created by PhpStorm.
 * User: Samir
 * Date: 04.02.2019
 * Time: 21:17
 */

namespace App\Traits;

trait Cloudflare
{
    use Requestable;

    public function addRecord($type, $zone, $api, $name, $content, $proxied, $email)
    {
        return $this->request('https://api.cloudflare.com/client/v4/zones/'.$zone.'/dns_records',[],'POST',[
            'headers'=>[
                'X-Auth-Email'=>$email,
                'X-Auth-Key'=>$api,
                'Content-Type'=>'application/json',
            ],
            'form_params' => [
                'type'=>$type,
                'name'=>$name,
                'content'=>$content,
                'proxied'=>$proxied,
            ]
        ]);
    }
}
