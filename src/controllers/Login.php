<?php
namespace Src\controllers;

use Src\models\User;

class Login extends BaseController
{
    public function index()
    {
        return $this->main();
    }

    public function login()
    {
        if (!empty($_POST) && isset($_POST['email']) && !empty($_POST['email'])){
           $user = User::where('email', '=', $_POST['email'])->get()->first();
           if(!isset($user)) { return $this->view->render(VIEW_DIR . '/login.php', ['error' => 'Не найден пользователь с такими данными!']);};
           
           if (isset($_POST['password']) && password_verify($_POST['password'], $user->password)){
                $_SESSION['id_user'] = $user->id;
                return $this->main();
            } 
            else  return $this->view->render(VIEW_DIR . '/login.php', ['error' => 'Не найден пользователь с такими данными!']);
        } 
        else  return $this->main();
    }
    public function logout()
    {
        session_unset();
        return $this->main();
    }

}
?>