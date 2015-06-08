<?php
require_once "lib/nusoap.php";
 
class Math {
    
    // $hasil = int;

    public function getJumlah($nilai1,$nilai2) {
        $hasil = $nilai1 + $nilai2;
        return $hasil;
    }
}
 
$server = new soap_server();
// $server->configureWSDL("foodservice", "http://www.greenacorn-websolutions.com/foodservice");
$server->configureWSDL("math", "http://localhost/soapwebservice/math");
 
$server->register("Math.getJumlah",
    array("nilai1" => "xsd:string","nilai2" => "xsd:string"),
    array("return" => "xsd:string"),
    "http://localhost/soapwebservice/math",
    "http://localhost/soapwebservice/math#getJumlah",
    "rpc",
    "encoded",
    "Get food by type");
 
@$server->service($HTTP_RAW_POST_DATA);