<?php
namespace Src\controllers;

use Src\models\User;

include ' ../../vendor/autoload.php';

class Registr extends BaseController
{
    public function index()
    {
       return $this->view->renderTwig('/auth.php', ['type' => 'TWIG']);
    }

    public function auth()
    {
        if (!empty($_POST)){
            
            $user = new User;
            $user->email = $_POST['email'];
            $user->name = $_POST['name'];
            if($_POST['password'] == $_POST['confirm_password']){
                $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            }
            if($user->save()) 
            {
               // $this->sendMail($user->email, $user->name, 'Вы успешно авторизировались! <a href = "localhost/login">Войдите!<a>');
                return $this->view->render(VIEW_DIR . '/login.php', ['info' => 'Вы успешно авторизировались! Войдите!']);
            }
                else  return $this->view->renderTwig('/auth.php', ['type' => 'TWIG', 'error' => $user->error]);


        }
        return $this->index();
    }

    private function sendMail($email, $name, $text)
    {
        $transport = (new Swift_SmtpTransport('smtp.mail.ru', 465, 'ssl'))
                        ->setUsername('testloftprj@mail.ru')
                        ->setPassword('pENk5Rt7@:RYRR')
                    ;
        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);

        // Create a message
        $message = (new Swift_Message('Регистрация'))
            ->setFrom(['testloftprj@mail.ru' => 'Admin'])
            ->setTo([$email, $email => $name])
            ->setBody($message_text)
        ;

        // Send the message
        return $mailer->send($message);
    }
}
?>