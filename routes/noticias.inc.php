<?php
$this->get('noticias', function ($arg) {
    $news = $this->core->loadModule('news');

    $array = array();
    $array['news'] = $news->getNewsList();

    //view, dados e o template
    $this->loadView('noticias', $array, 'padrao');
});

$this->get('noticias/add', function ($arg) {
    $data = $this->core->loadModule('news');

    $array = array();
    $array['autores'] = $data->getAutores();

    //view, dados e o template
    $this->loadView('noticia-nova', $array, 'padrao');
});

$this->post('noticias/addNoticia', function ($arg) {
    $newsAdd = $this->core->loadModule('news');

    if ($newsAdd->setNews($_POST)) 
    {
        $vet['sucess'] = $newsAdd->msgSucess;
        $vet['resp'] = 1;
    } 
    else 
    {
        $vet['erro'] = $newsAdd->msgErro;
        $vet['resp'] = 0;
    }

    echo json_encode($vet);
});

$this->get('noticias/acesso/{id}', function ($arg) {
    $news = $this->core->loadModule('news');

    $array = array();
    $array['info'] = $news->getNewsListInfo($arg['id']);
    
    $this->loadView('noticia-acesso', $array, 'padrao');
});

$this->get('noticias/pesquisa', function ($arg) {
    $data = $this->core->loadModule('news');

    $array = array();
    $array['autores'] = $data->getAutores();

    //view, dados e o template
    $this->loadView('noticia-pesquisa', $array, 'padrao');
});

$this->post('noticias/pesquisaNoticia', function ($arg) {
    $data = $this->core->loadModule('news');

    $vet = array();

    if ($data->pesquisaNoticia($_POST))
    {
        $vet['corpinhoTabela'] = $data->pesqNoticia;
        $vet['resp'] = 1;
    } 
    else 
    {
        $vet['erro'] = $data->msgErro;
        $vet['resp'] = 0;
    }
    //echo $data->pesqNoticia;
    //print_r($vet);
    echo json_encode($vet);
    
    
});