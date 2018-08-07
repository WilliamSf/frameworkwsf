<?php
$this->get('admin/home', function ($arg) {
    helperLogin::verifyLogin();

    $array = array();

    $this->loadView('admin-home', $array, 'padrao');
});