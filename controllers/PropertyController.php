<?php
namespace Controllers;
use MVC\Router;
use Model\Property;
use Model\Seller;
use Intervention\Image\ImageManagerStatic as Image;


class PropertyController{
    public static function index(Router $router){
        $properties = Property::all();
        $result = $_GET['result'] ?? null;
        $router->render('properties/admin',['properties' => $properties, 'result'=>$result]);
    }

    public static function create(Router $router){
        $property = new Property;
        $sellers = Seller::all();
        $errors = Property::getErrors();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
              //create a new instance
            $property = new Property($_POST['property']);

            // generate a unique imagename
            $imageName = md5(uniqid(rand(),true)).".jpg";

            //debugear($_FILES['property']);

            if($_FILES['property']['tmp_name']['image']){
                //resize image with  intervention image
                $image = Image::make($_FILES['property']['tmp_name']['image'])->fit(800,600);
                $property->setImage($imageName);
            }

            $errors = $property->validate();

            //check that $errors array is empty
            if(empty($errors)){
                //create folder for uploading images
                if(!is_dir(IMAGES_FOLDER)){
                    mkdir(IMAGES_FOLDER);
                }

                ///save image on server
                $image->save(IMAGES_FOLDER.$imageName);

                //save on db
                $property->saving();
            }
        }

        $router->render('properties/create',['property' => $property, 'sellers' => $sellers, 'errors' => $errors]);
    }

    public static function update(){
        echo "Update";
    }
}