<?php

namespace App\Controllers;

use App\Config\Configuration;
use App\Models\Post;
use http\Env\Request;

/**
 * Class HomeController
 * Example of simple controller
 * @package App\Controllers
 */
class HomeController extends AControllerRedirect
{
    public function index()
    {
        return $this->html(
            [
                "success" => $this->request()->getValue("success")
            ]
        );
    }
    public function collectionUSSR()
    {
        return $this->html();
    }
    public function drive()
    {
        return $this->html();
    }
    public function contact()
    {
        return $this->html(
            []
        );
    }

    public function addLike(){
        $postId = $this->request()->getValue('postid');
        if ($postId>0){
            $post = Post::getOne($postId);
            $post->addLike();
        }
        $this->redirect('home');
    }
    public function upload(){
        if (!\App\Auth::isLogged()) {
            $this->redirect("home");
        }
        if (isset($_FILES['file'])) {
            if ($_FILES["file"]["error"] == UPLOAD_ERR_OK) {
                $name = date('Y-m-d-H-i-s_') . $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], \App\Config\Configuration::UPLOAD_DIR . "$name");
                $newPost = new Post();
                $newPost->setImage($name);
                $newPost->save();
            }
        }
        $this->redirect("home");
    }

    public function post()
    {
        if(\App\Auth::isLogged())
        {
            return $this->html();
        }else{
            $this->redirect("home");
        }
    }

}