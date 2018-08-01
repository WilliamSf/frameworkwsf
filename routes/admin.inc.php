<?php
$this->get('admin/home', function ($arg) {
    $verificaLogin = $this->core->loadModule('helpers');
    if (!$verificaLogin->verifyLogin()) 
    {
        header("Location: ".BASE."login");
        exit;
    }
    $array = array();

    $this->loadView('admin-home', $array, 'padrao');
});