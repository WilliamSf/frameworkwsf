<?php
class Select 
{
    public $msgErro;
    public $msgSucess;
    public $cidades;
    private $db;
    private $valida;

    private function __construct()
    {
        $core = Core::getInstance();
        $this->db = $core->loadModule('database');
        $this->valida = $core->loadModule('helpers');
    }

    public static function getInstance()
    {
        static $inst = null;

        if ($inst === null)
        {
            $inst = new Select();
        }
        return $inst;
    }

    public function getEstados()
    {
        $array = array();

        $sql = $this->db->query("SELECT * FROM estado");

        if ($sql->rowCount() > 0)
        {
            $array = $sql->fetchAll();
        }

        return $array;

    }

    public function getMunicipios($Uf)
    {

        $sql = $this->db->prepare("SELECT * FROM municipio WHERE Uf = :Uf");
        $sql->bindValue(":Uf", $Uf);
        $sql->execute();

        if ($sql->rowCount() > 0)
        {
            $resultados = $sql->fetchAll();

            foreach ($resultados as $key => $value)
            {
                $this->cidades .= "
                    <option value='{$value['Id']}'>{$value['Nome']}</option>
                ";
            }
            return true;
        }

    }
}