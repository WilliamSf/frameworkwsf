<?php
class Template
{
    private function __construct(){}

    public static function getInstance()
    {
        static $inst = null;

        if ($inst === null) {
            $inst = new Template();
        }
        return $inst;
    }

    public function render($view, $data = array())
    {
        if (file_exists('views/'.$view.'.php'))
        {
            require 'views/'.$view.'.php';
        }
    }

    public function renderTPL($view, $data = array(), $template)
    {
        $viewName = explode("-", $view);
        $viewTipo = array_shift($viewName);
        $viewCss  = end($viewName);

        if ($viewTipo == 'admin')
        {
            if (file_exists('templates/' . $template . '.template.php') & file_exists('assets/css/templates/area-administrativa/page/admin.' . $viewCss . '.css'))
            {
                require 'templates/' . $template . '.template.php';
                echo '<link type="text/css" rel="stylesheet" href="' . RAIZ . 'assets/css/templates/area-administrativa/page/admin.' . $viewCss . '.css"  media="screen,projection"/>';
            }
        }
        elseif ($viewTipo == 'cliente')
        {
            if (file_exists('templates/' . $template . '.template.php') & file_exists('assets/css/templates/area-cliente/page/cliente.' . $viewCss . '.css'))
            {
                require 'templates/' . $template . '.template.php';
                echo '<link type="text/css" rel="stylesheet" href="' . RAIZ . 'assets/css/templates/area-cliente/page/cliente.' . $viewCss . '.css"  media="screen,projection"/>';
            }
        }
        else
        {
            require 'templates/' . $template . '.template.php';
        }
    }

    /* public function renderComplete($view, $data = array(), $template)
    {
        if (file_exists('assets/css/templates/area-administrativa/page/'.$css.'.admin.css') & file_exists('templates/'.$template.'.template.php'))
        {
            echo '<link type="text/css" rel="stylesheet" href="' . RAIZ . 'assets/css/templates/area-administrativa/page/' . $view . '.admin.css"  media="screen,projection"/>';
            require 'templates/'.$template.'.template.php';
        }

        if (file_exists('css/templates/area-cliente/page/'.$css.'.cliente.css'))
        {
            # code...
        }

    } */
}