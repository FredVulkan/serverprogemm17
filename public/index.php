<?php

use App\Cat;
use App\Controllers\BaseController;
use App\DB;
use App\DI;
use App\Router;
session_start();
require __DIR__ . '/../vendor/autoload.php';

require('../app/helpers.php');
DI::$router = new AltoRouter();
$routes = include(__DIR__ . "/../routes.php");
DI::$router ->addRoutes($routes);
// match current request url
$match = DI::$router->match();
// call closure or throw 404 status

DI::$DB = new DB('database', 'root', 'secret', 'homestead');
DI::$DB->connect();
//DI::$router = new Router($_SERVER["REQUEST_METHOD"], $_SERVER["REQUEST_URI"], "/");
//DI::$router->match();
if( is_array($match) && is_callable( $match['target'] ) ) {
    call_user_func_array( $match['target'], $match['params'] );
} else {
    // no route was matched
    header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}