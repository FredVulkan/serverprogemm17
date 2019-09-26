<?php

function view($view, $variables = []){
    extract($variables);
    $view = __DIR__ . "/../views/$view.php";
    include(__DIR__ . "/../views/template.php");
}
function uri(){
    $match = App\DI::$router->match();
    return $match["name"];
}