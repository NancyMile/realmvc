<?php

define('TEMPLATES_URL',__DIR__.'/templates');
define('FUNCTIONS_URL',__DIR__.'functions.php');
define('IMAGES_FOLDER',__DIR__.'/../images/');

function addTemplate(string $name, bool $home = false){
    include TEMPLATES_URL."/$name.php";
}

function authenticated(){
    session_start();

    if(!$_SESSION['login']){
        header('location: /');
    }
}

function debugear($var){
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    exit;
}

//escapa el html sanitizing
function sanitizingHtml($html): string {
    $s = htmlspecialchars($html);
    return $s;
}

//validate type content
function validateContentType($type){
    $types = ['sellers','properties'];
    return in_array($type, $types);
}

//display messages
function displayMessages($cod){
    $message = '';
    switch($cod){
        case 1:
            $message = "Created";
            break;
        case 2:
            $message = "Updated";
            break;
        case 3:
            $message = "Deleted";
            break;
        default:
            $message = false;
        break;
    }
    return $message;
}

