<?php
/**
 * User: Michael
 * Date: 6/11/15
 * Time: 5:28 PM
 */

//namespace HTTPoP;


class httpop
{
    public function encode_httpop($input, $encryptionKey = "") {
        if($encryptionKey != "") {
            $encoded = bin2hex(base64_encode(($input));
            return $encoded;
        } else {
            $encrypted = openssl_encrypt($input,"AES256",$encryptionKey);
            $encoded = bin2hex(base64_encode($encrypted));
        }
        return $encoded;
    }

    public function decode_httpop($input, $encryptionKey = "") {
        if($encryptionKey != "") {
            $decoded = pack('H*',base64_decode($input));
            return $decoded;
        } else {
            $decrypted = openssl_decrypt($input,"AES256",$encryptionKey);
            $decoded = pack('H*',base64_decode($decrypted));
        }
        return $decoded;
    }

    public function httpop_encode_url($url, $encryptionKey = "") {
        $raw = file_get_contents($url);

        if($encryptionKey != "") {
            $encoded = bin2hex($raw);
        } else {
            $encrypted = openssl_encrypt($raw, "AES256", $encryptionKey);
            $encoded = bin2hex($encrypted);
        }
    }
}
