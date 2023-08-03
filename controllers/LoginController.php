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
                $result = $auth->verifyUserExists();
                if(!$result){
                    $errors = Admin::getErrors();
                }else{
                    //verify pass
                    $authenticated = $auth->verifyPassExists($result);
                    if(!$authenticated){
                        $errors = Admin::getErrors();
                    }else{
                        //authenticate user
                        $auth->loginAuthUser();
                    }
                }
            }
        }

        $router->render('auth/login',['errors' => $errors]);
    }

    public static function logout(){
        echo "Log out";
    }


}