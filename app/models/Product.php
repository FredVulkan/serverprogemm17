<?php


namespace App\Models;


class Product extends Model
{
    public static $tableName = 'products';
    public $id;
    public $name;
    public $price;
}