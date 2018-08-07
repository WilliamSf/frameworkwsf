<?php
$this->get('cliente/home', function ($arg) {
    //helperLogin::verifyLogin();

    $array = array();

    $this->loadView('cliente-home', $array, 'cliente');
});