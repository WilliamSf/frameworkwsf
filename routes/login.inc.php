<?php
//Login
$this->get('login', function ($arg) {

    $array = array();

    $this->loadView('login', $array, 'login');
});

$this->post('login', function ($arg) {

    $array = array();

    $this->loadView('login', $array, 'login');
});