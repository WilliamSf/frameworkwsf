<?php
$this->get('admin/login', function ($arg) {
    //helperLogin::verifyLogin();

    $array = array();
    $this->loadView('admin-login'/*view*/, $array /*dados*/, 'admin-login'/*template*/ );
});