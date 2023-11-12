<?php
namespace Base;

class Route
{
    private $routes;
    private $controller;
    private $action;
    private $controllerName;
    private $actionName;

    private $processed = false;

    public function addRoute($route, $controllerName, $actionName = 'index')
    {
        $this->routes[$route] = [$controllerName, $actionName];
    }

    public function getControllerName()
    {
        if(!$this->processed) {
            $this->process();
        }
        return $this->controllerName;
    }
    
    public function getActionName()
    {
        if(!$this->processed) {
            $this->process();
        }
        return $this->actionName;
    }

    private function process()
    {
        $parsed = parse_url($_SERVER['REQUEST_URI']);
        $url = $parsed['path'];
        if (($route = $this->routes[$url] ?? null) !== null){
            $this->controllerName = $route[0];
            $this->actionName = $route[1]; 
            return true;
        }
        $this->controllerName = 'Src\controllers\NotFound';
        $this->actionName = 'index'; 
        return true;
    }
}
?>