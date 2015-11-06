<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 6/11/15
 * Time: 5:35 PM
 */

require('httpop.php');

$httpop = new httpop();

echo $httpop->decode_httpop("48656c6c6f2c20576f726c64", "Hello");


?>