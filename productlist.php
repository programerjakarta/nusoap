<?php
require_once "lib/nusoap.php";
 
function getProd($category) {
    if ($category == "books") {
        return join(",", array(
            "The WordPress Anthology",
            "PHP Master: Write Cutting Edge Code",
            "Build Your Own Website the Right Way"));
    }
    else {
            return "No products listed under that category";
    }
}
 
$server = new soap_server();
// $server->configureWSDL('demo', 'urn:demo');
$server->configureWSDL("productlist", "http://localhost/soapwebservice/productlist");
 
$server->register("getProd",
    array("category" => "xsd:string"),
    array("return" => "xsd:string"),
    "http://localhost/soapwebservice/productlist",
    "http://localhost/soapwebservice/productlist#getProd",
    "rpc",
    "encoded",
    "Get a listing of products by category");
$server->service($HTTP_RAW_POST_DATA);