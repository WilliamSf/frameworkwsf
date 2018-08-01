<?php

/**
 * Classe responsavel para criação de metodos de 'ajudas'
 * @method validaFrom (array()); @return true  
 * @method validaData (d/m/Y); @return $datavalida = Y-m-d  
 */

class Helpers
{
    private $db;

    private function __construct()
    {
        $core = Core::getInstance();
        $this->db = $core->loadModule('database');
    }

    public static function getInstance()
    {
        static $inst = null;

        if ($inst === null) {
            $inst = new Helpers();
        }
        return $inst;
    }

    /** ValidaFrom
    * Responsavel por tirar espaços em branco e tags HTML 
    */
    public function validaFrom($vet)
    {
        if (!empty($vet) & is_array($vet))
        {
            $seguro1 = array_map('strip_tags', $vet);
            $seguro2 = array_map('trim', $seguro1);

            return $seguro2;
        } 
        else 
        {
            return false;
        }
    }

    /** ValidaData
     * Recebe uma data em nosso formato (dia/mês/ano), verifica sé uma data valida e retorna o valor em formato do Banco de dados (ano/mês/dia) 
     */
    public function validaData($data)
    {
        $data = trim($data);

        //Se a data for menor que 8 e não tiver vazio
        if (!empty($data) & strlen($data) < 8)
        {
            return false;
        } 
        else 
        {
            //Verifica se a data tem a barra(/) de separação
            if (strpos($data, "/") !== false) 
            {
                $partes = explode("/", $data);
                //Pega o dia da data
                $dia = $partes[0];
                //Pega o mês da data
                $mes = $partes[1];
                //Previne o Notice: Undefined offset: 2, caso informe a data com uma única barra(/)
                $ano = isset($partes[2]) ? $partes[2] : 0;
                //Verifica se o ano é menor que 4
                if (strlen($ano) < 4) 
                {
                    return false;
                } 
                else 
                {
                    //Verifica se a data é válida
                    if (checkdate($mes, $dia, $ano))
                    {
                        //Passa para o formato do Banco
                        $dataValidada = $ano."-".$mes."-".$dia;
                        return $dataValidada;
                    } 
                    else 
                    {
                        return false;
                    }
                }
            } 
            else
            {
                return false;
            }
        }
    }

    public function verifyLogin()
    {
        if (!empty($_SESSION['hashlogin']))
        {
            $s = $_SESSION['hashlogin'];

            $sql = $this->db->prepare("SELECT * FROM users WHERE loginhash = :hash");
            $sql->bindValue(":hash", $s);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $data = $sql->fetch();
                $this->idUser = $data['id'];

                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }

    /** ValidaUserName
     * Recebe um valor e verfica se tem letras de a-z e se tem numero de 0-9
     */
    public function validaUserName($name)
    {
        if (!empty(preg_match('/^[a-z0-9]+$/', $name)))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /** ValidaUserSenha
     * Regex para verficar a força da senha
     * @param string tem que conter letra maiúscula
     * @param string tem que conter letra minúscula
     * @param int tem que conter número
     */
    public function validaUserSenha($pass)
    {
        if (preg_match('/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/', $pass))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /** UserExistente
     * Recebe o usuario digitado e faz um select para ver se tem o usuario
     * @param String;
     */
    public function userExistente($user)
    {
        $sql = $this->db->prepare("SELECT * FROM users WHERE username = :user");
        $sql->bindValue(":user", $user);
        $sql->execute();

        if ($sql->rowCount() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /** ValidaUser
     * Responsavel pela verificação do login
     * @param String $username = usuario;
     * @param String $pass = senha;
     */
    public function validaUser($username, $pass)
    {
        $sql = $this->db->prepare("SELECT * FROM users WHERE username = :username");
        $sql->bindValue(":username", $username);
        $sql->execute();

        if ($sql->rowCount() > 0)
        {
            //Guarda os dados encontrados do user
            $dadosUser = $sql->fetch();
            //Função nativa do php que verifica o hash criado, se passa a senha que user digitou e o hash salvo no banco
            if (password_verify($pass, $dadosUser['pass']))
            {
                $loginhash = md5(rand(0,99999).time().$dadosUser['id'].$dadosUser['username']);

                //Metodo responsavel por enviar o hash criado para o banco
                $this->setLoginHash($dadosUser['id'], $loginhash);
                //Salva o hash na session
                $_SESSION['hashlogin'] = $loginhash;
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }

    /** SetLoginHash
     * Responsavel por salvar o hash do usuario toda vez em que ele faça o login
     * @param String $id = id do usuario;
     * @param String $loginhash = hash gerado no método de @method validaUser
     */
    private function setLoginHash($id, $loginhash)
    {
        $sql = $this->db->prepare("UPDATE users SET loginhash = :loginhash WHERE id = :id");
        $sql->bindValue(":loginhash", $loginhash);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

}