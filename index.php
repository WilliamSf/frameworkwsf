<?PHP 
session_start();
//puxando a configuração do banco e conexão
require 'config.php';

//composer
require_once './vendor/autoload.php';

spl_autoload_register(function($class){
    if (file_exists('modules/'.$class.'/'.$class.'.php'))
    {
        require 'modules/'.$class.'/'.$class.'.php';
    }
    elseif(strpos($class, 'helper') > -1) 
    {
        if(file_exists('helpers/'.$class.'.php'))
        {
            require_once 'helpers/'.$class.'.php';
        }
    }
});

Core::getInstance()->run($config);
