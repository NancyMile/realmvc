<?php
namespace Controllers;
use MVC\Router;

class PropertyController{
    public static function index(Router $router){
        $router->render('properties/admin');
    }

    public static function crete(){
        echo "Create";
    }

    public static function update(){
        echo "Update";
    }
}