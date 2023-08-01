<?php
require __DIR__.'/../includes/app.php';
use MVC\Router;
use Controllers\PropertyController;
use Controllers\SellerController;

$router = new Router();
//debugear(PropertyController::class);

$router->get('/admin',[PropertyController::class,'index']);
$router->get('/properties/create',[PropertyController::class,'create']);
$router->post('/properties/create',[PropertyController::class,'create']);
$router->get('/properties/update',[PropertyController::class,'update']);
$router->post('/properties/update',[PropertyController::class,'update']);
$router->post('/properties/delete',[PropertyController::class,'delete']);


$router->get('/sellers/create',[SellerController::class,'create']);
$router->post('/sellers/create',[SellerController::class,'create']);
$router->get('/sellers/update',[SellerController::class,'update']);
$router->post('/sellers/update',[SellerController::class,'update']);
$router->post('/sellers/delete',[SellerController::class,'delete']);

$router->verifyRoute();
