<?php 
/**
 * 
 */
class helperLogin
{
	
    public static function verifyLogin()
    {
        if (!empty($_SESSION['hashlogin']))
        {
            $s = $_SESSION['hashlogin'];

            $verifica = Database::getInstance();

            $sql = $verifica->prepare("SELECT * FROM users WHERE loginhash = :hash");
            $sql->bindValue(":hash", $s);
            $sql->execute();

            if ($sql->rowCount() > 0)
            {
                $data = $sql->fetch();
                //$this->idUser = $data['id'];

                return true;
            }
            else
            {
            	header("Location: ".BASE."login");
        		exit;
            }
        }
        else
        {
            header("Location: ".BASE."login");
        	exit;
        }
    }
}