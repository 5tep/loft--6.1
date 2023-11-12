<?php
namespace Base;

use Route;
use Src\controllers\NotFound;
use Src\controllers\Login;
use Src\controllers\Registr;
use Src\controllers\PostController;

class Application 
{
    private $route;
    //private $user;

    public function __construct($route)
    {
        $this->route = $route;
        //$this->user = $user;

    }

    public function run ()
    {
        $view = new View();
        $controllerName = $this->route->getControllerName();
        $actionName = $this->route->getActionName();
        $controller = new $controllerName();
        $controller->setView($view);
        //$controller->setUser($this->user);
        $content = $controller->$actionName();
        echo $content;
    }
}
?>