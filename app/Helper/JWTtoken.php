<?php

namespace App\Helper;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
class JWTtoken
{ 
    function CreateuserToken($userEmail): string{
        $key  = env('JWT_KEY');
        $payload = [
         'iss' => 'Laravel',
         "iat" => time(),
         "exp" => time() + 60 * 60,
         'user_email' => $userEmail,
        ];
        return JWT::encode($payload, $key, 'HS256');
    
    }

    function verifyToken($token){
        $key = env('JWT_KEY');
        $decoded = JWT::decode($token, new Key($key,'HS256'));
    

    }

 
}