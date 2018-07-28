<?php
class Router
{
    private $core;
    private $get;
    private $post;

    private function __construct(){}

    public static function getInstance()
    {
        static $inst = null;

        if ($inst === null) {
            $inst = new Router();
        }
        return $inst;
    }

    public function load()
    {
        $this->core = Core::getInstance();
        $this->loadRouteFile('default');
        return $this;
    }

    public function loadRouteFile($f)
    {
        if (file_exists('routes/'.$f.'.inc.php'))
        {
            require 'routes/'.$f.'.inc.php';
        }
    }

    public function loadView($view, $data = array(), $template = '')
    {
        $this->core = Core::getInstance();
         
        $tpl = $this->core->loadModule('template');

        if (!empty($template))
        {
            $tpl->renderTPL($view, $data, $template);
        }
        else
        {
            $tpl->render($view, $data);
        }
    }

    public function match()
    {
        $url = ((isset($_GET['url']))?$_GET['url']:'');

        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                default:
                $type = $this->get;
            break;
            case 'POST':
                $type = $this->post;
            break;
        }

        //loop em todos os routes
        foreach ($type as $pt => $func) 
        {
            //Identifica os argumentos passados (get or post) e substitui por regex
            $pattern = preg_replace('(\{[a-z0-9]{0,}\})','([a-z0-9]{0,})',$pt);

            //Faz o macth da url
            if (preg_match('#^('.$pattern.')*$#i', $url, $matches) === 1)
            {
                array_shift($matches);
                array_shift($matches);

                //print_r($matches);

                //pega todos argumentos passados
                $itens = array();
                if (preg_match_all('(\{[a-z0-9]{0,}\})', $pt, $m)) 
                {   
                    $itens = preg_replace('(\{|\})', '', $m[0]);
                    //print_r($itens);
                }

                //faz associação
                $arg = array();
                foreach ($matches as $key => $macth)
                {
                    $arg[$itens[$key]] = $macth;
                }

                //print_r($arg);

                $func($arg);
                break;
            }

            
        }
    }

    public function get($pattern, $function)
    {
        $this->get[$pattern] =$function;
    }

    public function post($pattern, $function)
    {
        $this->post[$pattern] = $function;
    }

}