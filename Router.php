<?php
namespace MVC;
class Router{
    
    public $routeGET = [];
    public $routePOST = [];
    
    public function get($url, $fn){
        $this->routeGET[$url] = $fn;
    }

    public function post($url, $fn){
        $this->routePOST[$url] = $fn;
    }

    public function verifyRoute()
    {
        session_start();
        $auth = $_SESSION['login'] ?? null ;// true or false,assing null in case is not authenticated

        //array of protected routes
        $protected_routes = ['/admin', '/properties/create','/properties/update',
                            'properties/delete','/sellers/create','/sellers/update','sellers/delete'];

        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];
        
        if($method === 'GET'){
            //debugear($this->routeGET);
            $fn = $this->routeGET[$urlActual] ?? null;
        }else{
            $fn = $this->routePOST[$urlActual] ?? null;
        }

        //pretecting routes is not an auth user
        if(in_array($urlActual,$protected_routes) && !$auth){
            header('location: /');
        }

        if($fn){
            //$fn  existe  there is a function associated on index

            call_user_func($fn,$this);
        }else{
            echo "Page not found.";
        }
    }

    //display view
    public function render($view, $data = []){
        foreach($data as $key=>$value){
            $$key = $value;
        }
        ob_start();
        include __DIR__."/views/$view.php";
        $content = ob_get_clean();
        include __DIR__."/views/layout.php";
    }
}