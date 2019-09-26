<?php

use App\Controllers\BaseController;
use App\Controllers\EmployeeController;
use App\Controllers\ProductController;

return [
    "page1" => ["page1", BaseController::class],
    "page2" => ["page2", BaseController::class],
    "" => ["home", BaseController::class],
    "employees" => ["index", EmployeeController::class],
    "employees/create" => ["create", EmployeeController::class],
    "employees/store" => ["store", EmployeeController::class],
    "employees/view" => ["view", EmployeeController::class],
    "employees/edit" => ["edit", EmployeeController::class],
    "employees/update" => ["update", EmployeeController::class],
    "employees/delete" => ["delete", EmployeeController::class],
    "products" => ["index", ProductController::class],
];