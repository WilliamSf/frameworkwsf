<?php
class Core
{
    private $config;

    private function __construct(){} 

    public static function getInstance()
    {
        static $inst = null;

        if($inst === null)
        {
            $inst = new Core();
        }
        return $inst;
    }

    public function run($cfg)
    {
        $this->config = $cfg;
        $this->loadModule('router')->load()->match();
    }

    //Caso preciso pegar outra config do banco de dados, usa o getConfig e passo o nome
    public function getConfig($name)
    {
        return $this->config[$name];
    }

    public function loadModule($moduleName)
    {
        try
        {
            $moduleName = ucfirst(strtolower($moduleName));
            $module = $moduleName::getInstance();
            return $module; 
        }
        catch (Exception $e)
        {
            die ($e->getMessage());
        }
        
    }

    public function loadFrameworkCss($nomeFrame)
    {
        $nomeCheck = strtolower($nomeFrame);

        if (file_exists('assets/framework/'.$nomeCheck.'/'.$nomeCheck.'.frame.css.php'))
        {
            include 'assets/framework/'.$nomeCheck.'/'.$nomeCheck.'.frame.css.php';
        }
    }

    public function loadFrameworkJs($nomeFrame)
    {
        $nomeCheck = strtolower($nomeFrame);

        if (file_exists('assets/framework/' . $nomeCheck . '/' . $nomeCheck . '.frame.js.php'))
        {
            include 'assets/framework/' . $nomeCheck . '/' . $nomeCheck . '.frame.js.php';
        }
    }


}
