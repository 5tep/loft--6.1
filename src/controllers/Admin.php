<?php
namespace Src\controllers;

use Src\models\User;

class Admin extends BaseController
{
    public function index($action = '')
    {
        $users = User::all()->toArray();
        return $this->view->render(VIEW_DIR . '/admin.php', ['users' => $users, 'action' => $action]);
    }

    public function addUser()
    {
        if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) ){
            $user = new User();
            $user->name = (string) $_POST['name'];
            $user->email = (string) $_POST['email'];
            $user->password = (string) password_hash($_POST['password'], PASSWORD_DEFAULT);;
            $user->save();
        }
        return $this->index('Пользователь добавлен!');
    }

    public function editUser()
    {
        if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['id']) ){
            $user = User::find($_POST['id']);
            $user->name = (string) $_POST['name'];
            $user->email = (string) $_POST['email'];
            $user->password = (string) password_hash($_POST['password'], PASSWORD_DEFAULT);
            $user->save();
        }
        return $this->index('Изменения внесены!');
    }
    public function deleteUser()
    {
        if(isset($_POST['id']) ){
            User::find($_POST['id'])->delete();
        }
        return $this->index('Пользователь удален :(');
    }


} 
?>