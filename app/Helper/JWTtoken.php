<?php

namespace App\Helper;

class JWTtoken
{ 
    function CreateuserToken($userEmail){
        $key  = env('JWT_SECRET');
        $payload = [
         'iss' => 'Laravel',
         "iat" => time(),
         "exp" => time() + 60 * 60,
         'user_email' => $userEmail,
        ];
    
    }
}