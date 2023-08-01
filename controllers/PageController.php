<?php
namespace Controllers;
 use MVC\Router;
 use Model\Property;

 class PageController{
    
    public static function index(Router $router){
        $home = true;
        $properties = Property::get(3);
        $router->render('/pages/index',['properties' => $properties, 'home' => $home]);
    }

    public static function about(){
        echo "About";
    }

    public static function properties(){
        echo "Properties";
    }

    public static function property(){
        echo "Property";
    }

    public static function blog(){
        echo "Blog";
    }

    public static function entry(){
        echo "Entry";
    }

    public static function contact(){
        echo "Contact";
    }
 }
