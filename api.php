<?php
define("JSON_CONTENT_TYPE","application/json");
define("V1_VERSION","V1");

define("HTTP_BAD_REQUEST", 400);
define("HTTP_NOT_ALLOWED", 405);

if (isset($_SERVER['CONTENT_TYPE'])){
    checkContentTypeInHeader();
}
else{
    returnHttpError(HTTP_BAD_REQUEST);    
}

function checkContentTypeInHeader(){
    $header = explode(";", $_SERVER['CONTENT_TYPE']);   
    if (count($header) == 2){
        if (isContentTypeJson($header)){
            $index1 = explode (":", $header[1]);
            $version = strtoupper($index1[1]);
            switch ($version){
                case V1_VERSION:
                    include_once './controller/start.php';
                    break;
                default :
                    returnHttpError(HTTP_NOT_ALLOWED);                    
            }
        }
        else{
            returnHttpError(HTTP_NOT_ALLOWED);
        }
    }
    else{
        returnHttpError(HTTP_NOT_ALLOWED);
    }    
}

function isContentTypeJson($header){
    $index0 = explode (":", $header[0]);
    return strtolower($index0[1]) == JSON_CONTENT_TYPE;  
}

function returnHttpError($httpError){
    http_response_code($httpError);
    echo "Please read the documentation of this service. <br />";      
}
