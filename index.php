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
});

Core::getInstance()->run($config);
