<?php
//Home do site
$this->get('', function($arg){

    $array = array();

    $this->loadView('site', $array, 'site');
});



$this->get('ERRO-404', function ($arg) {

    $array = array();

    $this->loadView('erro-404', $array, 'erro-404');
});

/**
 * Sempre que for feito uma rota nova lembre de criar outro loadRouteFile para a mesma
 * @param STRING $f = nome da rota criada
 */
$this->loadRouteFile('admin');
$this->loadRouteFile('cliente');
$this->loadRouteFile('admin-login');