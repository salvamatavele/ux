<?php 

use CoffeeCode\Router\Router;

require __DIR__ . "/vendor/autoload.php";

$router = new Router(__URL__);

$router->group(null)->namespace("app\Controllers");
$router->get("/", "PanelController:home",'home');
$router->get("/panel", "PanelController:index",'panel');

$router->get("/contact", "ContactController:index",'contact.index');
$router->post("/contact", "ContactController:store",'contact.store');

/**
 * Group Error
 * This monitors all Router errors. Are they: 400 Bad Request, 404 Not Found, 405 Method Not Allowed and 501 Not Implemented
 */
$router->group("error")->namespace("app\Controllers");
$router->get("/{errcode}", "ErrorController:index", "error");


/**
 * This method executes the routes
 */
$router->dispatch();

/*
 * Redirect all errors
 */
if ($router->error()) {
    $router->redirect("error",['errcode'=>$router->error()]);
}
