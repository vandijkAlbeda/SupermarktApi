<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ServiceHandler
 *
 * @author H.M
 */
include_once '../controllers/UrlBroker.php';
include_once '../controllers/QueryBroker.php';

//testcode
//$uri = "www.ictacademie/api.php/supermarkt/klanten/20?window=25";
//$object = new UriBroker($uri);
//echo $object->getUri()."<br />";
//echo $object->getUrlRef()->getUrl()."<br />";
//echo $object->getUrlRef()->getSource()."<br />";
//echo $object->getUrlRef()->getResource()."<br />";
//echo $object->getUrlRef()->getIdentifier()."<br />";
//echo $object->getQueryRef()->getQuery()."<br />";

class UriBroker {
    private $uri;
    private $urlRef;
    private $queryRef;
    
   //constructor
    function __construct($uri){
        $this->uri = $uri;
        
        $posQuestionMark = strpos($uri,"?");
        if ($posQuestionMark !== FALSE){
            // splits de uri in twee gedeelten          
            $this->queryRef = new QueryBroker(substr($uri,$posQuestionMark + 1,strlen($uri)));            
            $this->urlRef = new UrlBroker(substr($uri,0,$posQuestionMark));
        }else{
            $this->urlRef = new UrlBroker($uri);
        }
    }
    // ophalen noemen we binnen OO getters
    function getUri(){
        return $this->uri;
    }
    
    function getUrlRef(){
        return $this->urlRef;
    }
    
    function getQueryRef(){
        return $this->queryRef;
    }
}
