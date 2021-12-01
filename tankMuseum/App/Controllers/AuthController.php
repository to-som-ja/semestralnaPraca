<?php

namespace App\Controllers;

use App\Auth;
use App\Core\Responses\Response;
use App\Models\Users;

class AuthController extends AControllerRedirect
{

    /**
     * @inheritDoc
     */
    public function index()
    {
        // TODO: Implement index() method.
    }

    public function loginForm()
    {
        return $this->html(
            [
              "error" => $this->request()->getValue("error")
            ]
        );
    }
    public function registerForm()
    {
        return $this->html(
            [
                "error" => $this->request()->getValue("error")
            ]
        );
    }
    public function register()
    {
        $login = $this->request()->getValue("login");
        $password1 = $this->request()->getValue("password1");
        $password2 = $this->request()->getValue("password2");
        $check = $this->request()->getValue("check");
        if ($password1!=$password2){
            $this->redirect("auth", "registerForm", ["error" => "Passwords are different"]);
        }else{
            $user  = Users::getOneMail($login);
            if ( $user !=null){
                $this->redirect("auth", "registerForm", ["error" => "User already exists"]);
            }else{
            Auth::register($login,$password1);
            $this->redirect("home");}
        }
    }

    public function login()
    {
        $login = $this->request()->getValue("login");
        $password = $this->request()->getValue("password");

        $logged = Auth::login($login,$password);
        if ($logged)
        {
            $this->redirect("home");
        }else
        {
            $this->redirect("auth", "loginForm", ["error" => "Zle meno alebo heslo"]);
        }
    }
    public function logout()
    {
        Auth::logout();
        $this->redirect("home");
    }
}