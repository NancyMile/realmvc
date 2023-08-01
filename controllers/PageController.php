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

    public static function about(Router $router){
        $router->render('/pages/about');
    }

    public static function properties(Router $router){
        $properties = Property::all();
        $router->render('/pages/properties',['properties' => $properties]);
    }

    public static function property(Router $router){
        $id = validOrRedirect('/');
        $property = Property::find($id);

        $router->render('/pages/property',['property' => $property]);
    }

    public static function blog(Router $router){
        $router->render('/pages/blog');
    }

    public static function entry(Router $router){
        $router->render('pages/entry');
    }

    public static function contact(){
        echo "Contact";
    }
 }
