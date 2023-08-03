<?php
namespace Controllers;
use MVC\Router;
use Model\Admin;

class LoginController{

    public static function login(Router $router){
        $errors = [];
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            //debugear($_POST);
            $auth = new Admin($_POST);
            $errors = $auth->validate();

            if(empty($errors)){
                //verify is user exists

                //verify pass

                //authenticate user
            }
        }

        $router->render('auth/login',['errors' => $errors]);
    }

    public static function logout(){
        echo "Log out";
    }


}