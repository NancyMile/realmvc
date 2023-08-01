<?php
require __DIR__.'/../includes/app.php';
use MVC\Router;
use Controllers\PropertyController;
use Model\Property;

$router = new Router();
//debugear(PropertyController::class);

$router->get('/admin',[PropertyController::class,'index']);
$router->get('/properties/create',[PropertyController::class,'create']);
$router->post('/properties/create',[PropertyController::class,'create']);
$router->get('/properties/update',[PropertyController::class,'update']);
$router->post('/properties/update',[PropertyController::class,'update']);
$router->post('/properties/delete',[PropertyController::class,'delete']);

$router->verifyRoute();
