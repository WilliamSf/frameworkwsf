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

    /**
     * Método responsável 'renderiza' o template, view e o css
     * Para funcionar a parte de css para cada view deve seguir as regras:
     * Sempre que for criado uma view a mesma deve ter o prefixo 'admin-' ou 'cliente-' na frente.
     * Caso queira criar o css para a view deve ser criado o css no diretorio assets/css/templates/area-administrativa/page/ = para admin, 
     * caso seja para cliente nesse diretorio assets/css/templates/area-cliente/page/
     * Na criação do css deve ter o nome igual o da view depois do hífen e sempre ter o prefixo admin. ou cliente.
     * Por exemplo view = admin-login.php css = admin.login.css
     * @var $viewName = explode("-", $view) =  retiro o - da view
     * @var $viewTipo = array_shift($viewName) = pega o prefixo da view para fazer a verificação de qual área é
     * @var $viewCss  = end($viewName) = pega o nome da view depois do hífen
     */
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

}