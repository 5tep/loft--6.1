<?php
namespace Src\controllers;
use Src\models\Post;

class PostController extends BaseController
{
    private $post;

    public function addPost()
    {
        $post = new Post;
        if (!empty($_POST) && isset($_POST['title']) && isset($_POST['text']) && !empty($_POST['title']) && !empty($_POST['text'])){
            $post->title = $_POST['title'];
            $post->text = $_POST['text'];
            $post->id_user = $_SESSION['id_user'];
            if($_FILES['img']['size'] != 0){
                $post->img = base64_encode(file_get_contents($_FILES['img']['tmp_name']));
            }
            $post->save();
        }
        return $this->main();
    }

        public function getPosts(){
            if(isset($_GET['id_user'])){
                $posts = Post::where('id_user', '=', $_GET['id_user'])->limit(20)->get()->toJson();
                header('Content-type: application/json');
                return $posts;
            }
            return null;
        }

        public function delPost()
        {
            if (!empty($_POST)){
                Post::find($_POST['id_post'])->delete();
            }
            return $this->main();
        }
    
}
?>