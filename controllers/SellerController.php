<?php
namespace Controllers;
use MVC\Router;
use Model\Seller;

class SellerController{

    public static function create(Router $router){
        $seller = new Seller;
        //error messages
        $errors = Seller::getErrors();
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            //debugear($_POST);
            $seller = new Seller($_POST['seller']);

            //validate
            $errors = $seller->validate();

            if(empty($errors)){
                $seller->saving();
            }
        }

        $router->render('/sellers/create',['seller' => $seller, 'errors' => $errors]);
    }

    public static function update(){
       echo "UPDATE"; 
    }

    public static function delete(){
        echo "DELETE";   
    }
}