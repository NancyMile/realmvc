<?php
namespace Controllers;

use PHPMailer\PHPMailer\PHPMailer;
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

    public static function contact(Router $router){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $response = $_POST['contact'];

            //intanciate phpmailer
            $mail = new PHPMailer();
            //configure smtp
            $mail->isSMTP();
            $mail->Host ='sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = '';
            $mail->Password ='';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;

            //email content
            $mail->setFrom('test@realmvc.com');
            $mail->addAddress('test@realmvc.com','real-s');
            $mail->Subject = 'New message  from realMVC';

            //allow html
            $mail->isHtml(true);
            $mail->CharSet = 'UTF-8';

            //debugear($response);

            //body content
            $content ='<html>';
            $content .= '<p>New message from realmvc! </p>';
            $content .= '<p>Name: '. $response['name'].' </p>';
            $content .= '<p>Message: '. $response['message'].' </p>';
            $content .= '<p>Type: '. $response['type'].' </p>';
            $content .= '<p>Price: $ '. $response['price'].' </p>';

            //send info according to user contat selection
            if($response['contact'] === 'email'){
                $content .= '<p> Please contact by email </p>';
                $content .= '<p>Email: '. $response['email'].' </p>';
            }else{
                $content .= '<p>Please contact by phone </p>';
                $content .= '<p>Phone: '. $response['phone'].' </p>';
                $content .= '<p>Date: '. $response['date'].' </p>';
                $content .= '<p>Time: '. $response['time'].' </p>';
            }
            $content .= '</html>';

            $mail->Body = $content;
            $mail->AltBody = "Text without html";

            //send email
            if($mail->send()){
                $message = " Email sent";
            }else{
                $message = "Email not sent";
            }

        }
        $router->render('pages/contact', ['message' => $message]);
    }
 }
