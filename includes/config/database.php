<?php
 function connectionDB() :mysqli {
    $db = new mysqli('localhost','root','Password1!','real_state_crud3');
    if(!$db){
        echo "No Conected";
        exit();
    }
    return $db;
 };