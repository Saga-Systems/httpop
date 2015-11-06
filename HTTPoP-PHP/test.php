<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 6/11/15
 * Time: 5:35 PM
 */

require('httpop.php');

$httpop = new httpop();

$encoded = $httpop->httpop_encode("Hello, World!", "Hello");

echo "Encoded is: ".$encoded."<br/>";

echo "Decoded is: ".$httpop->httpop_decode($encoded, "Hello")."<br/>";

echo "Encoded URL is: ".$httpop->httpop_encode_url("","HelloWorld")."<br/>";

echo "Decoded URL is: ".$httpop->httpop_decode_url("","HelloWorld")."<br/>";

?>