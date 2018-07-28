<?php

/**
 * .....
 * @param STRING 
 */


class Users
{

    private $idUser;

    private function __construct()
    {
        $core = Core::getInstance();
        $db = $this->db = $core->loadModule('database');

    }

    public static function getInstance()
    {
        static $inst = null;

        if ($inst === null) {
            $inst = new Users();
        }
        return $inst;
    }

    public function verifyLogin()
    {
        if (!empty ($_SESSION['hashlogin'])) 
        {
            $s = $_SESSION['hashlogin'];

            $sql = $db->prepare("SELECT * FROM users WHERE loginhash = :hash");
            $sql->bindValue(":hash", $s);
            $sql->execute();

            if ($sql->rowCount() > 0)
            {
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

}