<?php

/**
 * .....
 * @param STRING 
 */


class Users
{
    public $msgErro;
    public $msgSucess;
    private $db;
    private $valida;
    private $idUser;

    private function __construct()
    {
        $core = Core::getInstance();
        $db = $this->db = $core->loadModule('database');
        $this->valida = $core->loadModule('helpers');

    }

    public static function getInstance()
    {
        static $inst = null;

        if ($inst === null) {
            $inst = new Users();
        }
        return $inst;
    }

    
    //Método para logar
    public function userLogar($data)
    {
        //Validando os dados vindo pelo post
        $dataValidado = $this->valida->validaFrom($data);

        if (!empty($dataValidado))
        {
            $username = strtolower($dataValidado['username']);
            $pass = $dataValidado['pass'];

            if ($users = $this->valida->validaUser($username, $pass))
            {
                //Deu certo
                return true;
            }
            else
            {
                //Usuario ou a senha ta errada
                $this->msgErro = "Usuário ou senha errada, digite novamente !";
            }
        }
        else
        {
            //Não foi preenchido nada
            $this->msgErro = "Favor preencha seus dados !";
        }
    }

    //Método de cadastro
    public function cadastroUser($data)
    {
        $dataValidado = $this->valida->validaFrom($data);

        if (!empty($dataValidado))
        {
            $username = strtolower($dataValidado['username']);
            $pass =  password_hash($dataValidado['pass'], PASSWORD_DEFAULT);

            //Validando se é um user correto
            if ($users = $this->valida->validaUserName($username))
            {   
                //Validando se é uma senha forte
                if($forcaPass = $this->valida->validaUserSenha($dataValidado['pass']))
                {
                    //Validando se já existe, se não existir faz o cadastro 
                    if (!$usersExist = $this->valida->userExistente($username))
                    {
                        $sql = $this->db->prepare("INSERT INTO users (username, pass) VALUES (:username, :pass)");

                        try
                        {
                            $sql->bindValue(":username", $username);
                            $sql->bindValue(":pass", $pass);
                            $sql->execute();

                            $this->msgSucess = "Usuário cadastrado com sucesso!";
                            return true;

                        } 
                        catch (PDOException $e)
                        {
                            die($e->getMessage());
                            return false;
                        }
                    } 
                    else
                    {
                        $this->msgErro = "Usuário já cadastrado, tente outro !";
                    }                    
                }
                else
                {
                    //Senha não valida
                    $this->msgErro = "Senha não válida !";
                }
            }
            else 
            {
                //Usuario não válido
                $this->msgErro = "Usuário não válido (Digite apenas letras e números).";
            }
            
        }
        else
        {
            //Não veio nenhum dados
            $this->msgErro = "Preencha todos os campos.";
        }
    }

}