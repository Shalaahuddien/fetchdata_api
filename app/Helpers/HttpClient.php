<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Http;

class HttpClient
{
    static function fetch
    ( $method, $url, $body = [], $files = [] )
        {
            //jika mehod get langsung response dengan method get
            if ($method == "GET") return Http::get($url)->json();

            if (sizeof($files) > 0)
            {
                $client = Http::asMultipart();

                //attach setiap file pada client
                foreach ($files as $key => $file)
                {
                    $patch = $file->getPath();
                    $name = $file->getOriginalName();
                    //attach file

                    $client->attach($key, file_get_contents($path), $name);
                }
                //return api
                return $client-> post($url, $body);
            }
            //return post
            return Http::post($url, $body)->json();
        }
    
}