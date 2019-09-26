<?php
namespace App\Controllers;

use App\DI;
use App\Models\Employee;
use App\Models\Product;
use PDO;
use PDOException;
use PDOStatement;

class BaseController {
    public function page1(){
        $product = new Product();
        $product->id = 1;
        $product->name = "kassu";
        $product->price = 1.22;
        $sql = $product->getUpdateSql();
        var_dump($sql);
    }
    public function page2(){
        view('page2');
    }
    public function home(){
        view('index');
    }
}