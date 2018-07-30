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

}