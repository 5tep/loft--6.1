<?php

namespace Base;

use Src\models\User;


class View {

    public function render($path, $data = null)
    {
        include $path;        
    }

    public function renderTwig($path, $data = null)
    {
        $loader = new \Twig\Loader\FilesystemLoader(VIEW_DIR);
        $twig = new \Twig\Environment($loader);
        echo $twig->render($path, $data);        
    }
}
?>