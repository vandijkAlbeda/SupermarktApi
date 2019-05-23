<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UrlBroker
 *
 * @author H.M
 */
//$url = "/ictacademie.info/api.php/supermarkt/klanten/20";
//$object = new UrlBroker($url);
//
//echo $object->getSource()."<br />";
//echo $object->getResource()."<br />";
//echo $object->getIdentifier();


class UrlBroker {
    private $url;
    private $source;
    private $resource;
    private $identifier;
    private $isIdFoundInUrl;
    private $urlPathError;
    
    function __construct($url) {
        $this->url = $url;
        $search = "api.php";
        
        $urlElements = explode ("/", $url);
        $count = count($urlElements);
        
        $found = FALSE;
        $doorgaan = TRUE;
        while($doorgaan){
            
            $count--;         
            
            $read = array_shift($urlElements);
            
            $found = ($read == $search);

            $doorgaan = boolval($count) && !$found;
        }
        
        if ($found){
            switch (count($urlElements)){
                case 2:
                    $this->source = $urlElements[0];
                    $this->resource = $urlElements[1];
                    $this->isIdFoundInUrl = FALSE;               
                    break;
                case 3:
                    $this->source = $urlElements[0];
                    $this->resource = $urlElements[1];
                    $this->identifier = $urlElements[2];
                    $this->isIdFoundInUrl = TRUE;                       
                default :
                    $this->urlPathError = TRUE;
            }
        }
    } 
    
    function getSource(){
        return $this->source;
    }
    
    function getResource(){
        return $this->resource;
    }

    function getIdentifier(){
        return $this->identifier;
    }
    
    function getUrl(){
        return $this->url;
    }
    
    function isValid(){
        return $this->urlPathError;
    }
}
