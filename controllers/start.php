<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    // extract de uri in een array
    $uri = $_SERVER['REQUEST_URI'];
//    $uriElements = explode("/",$uri);
//    
//    // verwijder alle onnodige gegevens
//    $search = "start.php";
//    $doorgaan = TRUE;
//    while($doorgaan){
//        $read = array_shift($uriElements);
//        if ($read == $search){
//            $doorgaan = FALSE;
//        }
//    }
//    print_r($uriElements);  
   
    $serviceHandler = new ServiceHandler();
    $serviceHandler->findUriOptions($uri);
    
    switch($typeRequest){
        case 'GET':
            echo "I run a SELECT query in de database";
            break;
        case'POST':
            echo "I run a INSERT query in de database";
            break;
        case'DELETE':
            echo "I run a DELETE query in de database";
            break;
        case'PATCH':
            echo "I run a small UPDATE query in de database";
            break;  
        case'UPDATE':
            echo "I run a UPDATE query in de database";
            break;          
        default:
            http_response_code(405);              
    }


