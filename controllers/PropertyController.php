<?php
namespace Controllers;
use MVC\Router;

class PropertyController{
    public static function index(Router $router){
        $router->render('properties/admin',['property_type' => 'Apto']);
    }

    public static function create(){
        echo "Create";
    }

    public static function update(){
        echo "Update";
    }
}