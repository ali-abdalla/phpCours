<?php

namespace App\Service;

use App\Utils\StringUtils;

class Jwt
{
    public function generate():String{
        $header = [
            "alg"=> "HS256",
            "typ"=> "JWT",
        ];
        $headerBase64 = StringUtils::base64url_encode(
            json_encode($header),
        );
        $playload =[
            "iat"=>time(),
        ];
        $playloadBase64 =StringUtils::base64url_encode(
            json_encode($playload),
        );
        $signatureBase64 =StringUtils::base64url_encode(
            hash_hmac('sha256',
            "$headerBase64.$playloadBase64",
            $_ENV['SECRET'],
            )
        );
        $token ="$headerBase64.$playloadBase64.$signatureBase64";
        return $token;
    }
    public function verify(String $token):bool
    {
        [$headerBase64, $playloadBase64,$signature]=explode('.',$token);
        $signatureBase64 = StringUtils::base64url_encode(
            hash_hmac(
                'sha256',
                "$headerBase64.$playloadBase64",
                $_ENV['SECRET'],
            )
        );
        $signaturebverify = $signatureBase64 === $signature;
        return $signaturebverify;
    }
}