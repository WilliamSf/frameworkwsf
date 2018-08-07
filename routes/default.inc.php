<?php
//Home do site
$this->get('', function($arg){

    $array = array();

    $this->loadView('home', $array, 'site');
});



/**
 * Sempre que for feito uma rota nova lembre de criar outro loadRouteFile para a mesma
 * @param STRING $f = nome da rota criada
 */
$this->loadRouteFile('noticias');
$this->loadRouteFile('login');
$this->loadRouteFile('admin');
$this->loadRouteFile('cliente');