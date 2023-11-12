<?php
namespace Src\controllers;

use Src\models\User;
use Src\models\Post;

class BaseController
{
    public $error = '';
    protected $view;
    protected $user;

    public function setView($view)
    {
        $this->view = $view;
    }    
    
    public function setUser($user)
    {
        $this->user = $user;
    }

    public function main()
    {
        if (isset($_SESSION['id_user'])) {
            $user = User::find($_SESSION['id_user']);
            $is_admin = $user->isAdmin();
            $users = new User();
            $posts = Post::all()->sortByDesc('id')->toArray();   
            array_walk($posts, function (&$post) use ($users) {
                    if (isset($users->find($post['id_user'])->name)) {
                         $post['user'] = $users->find($post['id_user'])->name;
                    }
            });
            return $this->view->render(VIEW_DIR . '/blog.php', ['posts' => $posts, 'admin' => $is_admin]);
        }
        return $this->view->render(VIEW_DIR . '/login.php');
    }
}
?>