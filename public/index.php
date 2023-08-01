<?php
require __DIR__.'/../includes/app.php';
use MVC\Router;
use Controllers\PropertyController;
use Controllers\SellerController;
use Controllers\PageController;

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

$router->get('/',[PageController::class,'index']);
$router->get('/about',[PageController::class,'about']);
$router->get('/properties',[PageController::class,'properties']);
$router->get('/property',[PageController::class,'property']);
$router->get('/blog',[PageController::class,'blog']);
$router->get('/entry',[PageController::class,'entry']);
$router->get('/contact',[PageController::class,'contact']);
$router->post('/contact',[PageController::class,'contact']);

$router->verifyRoute();
