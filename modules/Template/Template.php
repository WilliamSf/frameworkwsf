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
        if (file_exists('templates/'.$template.'.template.php')) 
        {
            require 'templates/'.$template.'.template.php';
        }
    }
}