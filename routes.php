<?php

use App\controllers\AuthController;
use App\Controllers\BaseController;
use App\Controllers\EmployeeController;
use App\Controllers\ProductController;

return [
    ['GET', '/page1', [BaseController::class, 'page1'], "page1"],
    ['GET', '/page2', [BaseController::class, 'page2'], "page2"],
    ['GET', '/', [BaseController::class, 'home'], ""],
    ['GET', '/employees', [EmployeeController::class, 'index'], "employees"],
    ['GET', '/employees/create', [EmployeeController::class, 'create']],
    ['GET', '/employees/view', [EmployeeController::class, 'view']],
    ['POST', '/employees/store', [EmployeeController::class, 'store']],
    ['GET', '/employees/edit', [EmployeeController::class, 'edit']],
    ['POST', '/employees/update', [EmployeeController::class, 'update']],
    ['GET', '/employees/delete', [EmployeeController::class, 'delete']],
    ['GET', '/products', [ProductController::class, 'index']],
    ['GET', '/register', [AuthController::class, 'registerPage'], 'register'],
    ['GET', '/login', [AuthController::class, 'loginPage'], 'login'],
    ['POST', '/register', [AuthController::class, 'register']],
    ['POST', '/login', [AuthController::class, 'login']],
    ['GET', '/secret', [BaseController::class, 'secret']],
    ['GET', '/logout', [AuthController::class, 'logout']],
];