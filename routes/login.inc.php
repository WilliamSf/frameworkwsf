<?php
//Login
$this->get('login', function ($arg) {

    $array = array();

    $this->loadView('login', $array, 'login');
});

$this->post('login/logarUser', function ($arg) {
    $logar = $this->core->loadModule('users');
 
    if ($logar->userLogar($_POST))
    {
        $vet['resp'] = 1;
    }
    else
    {
        $vet['erro'] = $logar->msgErro;
        $vet['resp'] = 0;
    }

    echo json_encode($vet);
});

$this->get('cadastro', function ($arg) {

    $array = array();

    $this->loadView('cadastro', $array, 'login');
});

$this->post('cadastro/cadastroUser', function ($arg) {
    $cadastro = $this->core->loadModule('users');
    
    if ($cadastro->cadastroUser($_POST))
    {
        $vet['sucess'] = $cadastro->msgSucess;
        $vet['resp'] = 1;
    }
    else
    {
        $vet['erro'] = $cadastro->msgErro;
        $vet['resp'] = 0;
    }

    echo json_encode($vet);
});