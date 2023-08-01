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

    public static function update(Router $router){
       $id = validOrRedirect('/admin');
       //get the seller
        $seller = Seller::find($id);

        //error messages
        $errors = Seller::getErrors();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            //sincronize the values
            $args = $_POST['seller'];

            $seller->sincronnise($args);

            $errors = $seller->validate();

            if(empty($errors)){
                $seller->saving();
            }
        }

        $router->render('/sellers/update', ['seller' => $seller, 'errors' => $errors]);
    }

    public static function delete(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $id = filter_var($id,FILTER_VALIDATE_INT);
            if($id){
                $type = $_POST['type'];
                if(validateContentType($type)){
                    //is valid type
                    if($type === 'sellers'){
                        //remove the file
                        $seller = Seller::find($id);
                        $seller->delete();
                    }
                }
            }
        }
    }
}