<?php


namespace App\models;


class User extends Model
{
    static $tableName = 'users';
    public $id;
    public $email;
    public $password;
    public $name;

    public static function auth(){
        if ($_SESSION['userId']){
            return User::find($_SESSION['userId']);
        }
        return false;
    }
}