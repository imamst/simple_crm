<?php

namespace App\Traits;

trait RandomStringTrait {

    public function generateToken($length)
    {
        //Generate a random string.
        $token = openssl_random_pseudo_bytes($length);
        
        //Convert the binary data into hexadecimal representation.
        $token = bin2hex($token);
        
        return $token;
    }

}