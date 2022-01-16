<?php

namespace App;

use App\Models\Users;

class Auth
{

    public static function login($login, $password)
    {
        $user = Users::getOneMail($login);
        if ($user!=null) {
            $hashedPassword = $user->getPassword();
            $checkPassword = password_verify($password, $hashedPassword);
            if ($checkPassword) {

                $_SESSION["name"] = $login;
                return true;
            }
        }
            return false;

    }
    public static function register($login, $password)
    {
        $newUser = new Users();
        $newUser->setMail($login);
        $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
        $newUser->setPassword($hashedPassword);
        $newUser->save();
    }
    public static function isLogged()
    {
        return isset($_SESSION["name"]);
    }
    public  static function getName()
    {
        return(Auth::isLogged() ? $_SESSION["name"]: "");
    }
    public static function logout()
    {
        unset($_SESSION["name"]);
        session_destroy();
    }
}