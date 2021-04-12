<?php

    namespace LetoChat\JWT;

    class Token {

        private $data;

        public function __construct($data){

            $this->data = $data;

        }

        public function sign($secret, $exp = 86400){

            // Create the token header
            $header = json_encode([
                'typ' => 'JWT',
                'alg' => 'HS256'
            ]);

            // Create the token payload
            $payload = json_encode(array_merge($data, [
                'exp' => time() + $exp
            ]));

            // Encode Header
            $base64UrlHeader = self::base64UrlEncode($header);

            // Encode Payload
            $base64UrlPayload = self::base64UrlEncode($payload);

            // Create Signature Hash
            $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, $secret, true);

            // Encode Signature
            $base64UrlSignature = self::base64UrlEncode($signature);

            // Compose JWT
            $jwt = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;

            // done
            return $jwt;

        }

        public static function base64UrlEncode($text)
        {
            return str_replace(
                ['+', '/', '='],
                ['-', '_', ''],
                base64_encode($text)
            );
        }

    }