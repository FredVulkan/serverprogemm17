<?php


namespace App\controllers;



use App\models\user;

class AuthController
{
    public function registerPage(){
        view('auth/register');
    }
    public function register(){
            $user = new User();
            $user->email = $_POST['email'];
            $user->password = $_POST['password'];
            $user->name = $_POST['name'];
            $user->save();
            header('Location: /login');
            die();
    }
    public function loginPage(){
        view('auth/login');
    }
    public function login(){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = User::select("email='$email' AND password='$password'");
        if ($user){
            $_SESSION['userId'] = $user->id;
            header('Location: /secret');
        }else{
            header('Location: /login');
        }
        die();
    }

    public function logout(){
        unset($_SESSION['userId']);
        header('Location: /login');
        die();
    }
}