<?php
/**
 * User: Michael
 * Date: 6/11/15
 * Time: 5:28 PM
 */

//namespace HTTPoP;


class httpop
{
    public function httpop_encode($input, $encryptionKey = "") {
        if($encryptionKey == "") {
            $encoded = bin2hex(base64_encode(($input)));
            return $encoded;
        } else {

            $encrypted = openssl_encrypt($input,"AES256",$encryptionKey);
            $base64 = base64_encode($encrypted);
            $encoded = bin2hex($base64);
        }
        return $encoded;
    }

    public function httpop_decode($input, $encryptionKey = "") {
        if($encryptionKey == "") {
            $decoded = base64_decode(pack('H*',$input));
            return $decoded;
        } else {
            $raw = base64_decode(pack("H*",$input));
            $decoded = openssl_decrypt($raw,"AES256",$encryptionKey);
        }
        return $decoded;
    }

    public function httpop_encode_url($url, $encryptionKey = "") {
        $rawFile = file_get_contents($url);

        if($encryptionKey == "") {
            return bin2hex(base64_encode($rawFile));
        } else {
            $encrypted = openssl_encrypt($rawFile, "AES256", $encryptionKey);
            return bin2hex(base64_encode(openssl_encrypt($rawFile, "AES256", $encryptionKey)));
        }
        //return $encoded;
    }

    public function httpop_decode_url($url, $encryptionKey = "") {
        $rawFile = file_get_contents($url);

        if($encryptionKey == "") {
            return base64_decode(pack('H*',$rawFile));
        } else {
            $nobase64 = base64_decode(pack('H*',$rawFile));
            return openssl_decrypt($nobase64, "AES256", $encryptionKey);
        }
        //return $decoded;
    }


}
