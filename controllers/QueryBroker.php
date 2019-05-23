<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class QueryBroker {

    private $query;
    private $isValid = TRUE;

    function __construct($query){
	$this->query = $query;
    }
    
    function getQuery(){
        return $this->query;
    }

    function isValid(){
	return $this->isValid;
    }
} 

