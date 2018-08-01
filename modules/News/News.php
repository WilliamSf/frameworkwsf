<?php

/* ________´$$$$`_____________________________,,,_
_______´$$$$$$$`_________________________´$$$`
________`$$$$$$$`______,,________,,_______´$$$$´
_________`$$$$$$$`____´$$`_____´$$`____´$$$$$´
__________`$$$$$$$`_´$$$$$`_´$$$$$`__´$$$$$$$´
___________`$$$$$$$_$$$$$$$_$$$$$$$_´$$$$$$$´_
____________`$$$$$$_$$$$$$$_$$$$$$$`´$$$$$$´_
___,,,,,,______`$$$$$$_$$$$$$$_$$$$$$$_$$$$$$´_
_´$$$$$`____`$$$$$$_$$$$$$$_$$$$$$$_$$$$$$´_
´$$$$$$$$$`´$$$$$$$_$$$$$$$_$$$$$$$_$$$$$´_
´$$$$$$$$$$$$$$$$$$_$$$$$$$_$$$$$$$_$$$$$´_
___`$$$$$$$$$$$$$$$_$$$$$$$_$$$$$$_$$$$$$´_
______`$$$$$$$$$$$$$_$$$$$__$$_$$$$$$_$$´_
_______`$$$$$$$$$$$$,___,$$$$,_____,$$$$$´_
_________`$$$$$$$$$$$$$$$$$$$$$$$$$$$$$´_
__________`$$$$$$$$$$$$$$$$$$$$$$$$$$$´_
____________`$$$$$$$$$$$$$$$$$$$$$$$$´_
_______________`$$$$$$$$$$$$$$$$$$$$´_ */

class News
{
    public $pesqNoticia;
    public $msgErro;
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

        if ($inst === null) {
            $inst = new News();
        }
        return $inst;
    } 

    public function getNewsList()
    {
        $array = array();

        $sql = $this->db->query("SELECT * FROM noticias");

        if ($sql->rowCount() > 0)
        {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function getNewsListInfo($id)
    {
        $array = array();

        $sql = $this->db->prepare("SELECT * FROM noticias WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0)
        {
            $array = $sql->fetch();
        }
        
        return $array;
    }

    public function getAutores()
    {
        $array = array();

        $sql = $this->db->query("SELECT * FROM autores");

        if ($sql->rowCount() > 0) 
        {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function getAutoresId($id_autor)
    {
        $sql = $this->db->prepare("SELECT * FROM autores WHERE id_autor = :id_autor");
        $sql->bindValue(":id_autor", $id_autor);
        $sql->execute();

        if ($sql->rowCount() > 0)
        {
            return $id_autor;
        }
        else
        {
           $this->msgErro = "Favor preencher todos os campos !";
        }

    }


    public function setNews($data)
    {
        //Validando os dados
        $dataValidado = $this->valida->validaFrom($data);
        //Validando a data
        $dateValidado = $this->valida->validaData($data['data_noticia']);
        //Validadno o autor
        if (!empty($data['id_autor']))
        {
            $autorValida = $this->getAutoresId($data['id_autor']);
        }
        else
        {
            $this->msgErro = "Favor preencher todos os campos !";
        }

        
        if (empty($dataValidado['titulo']) || empty($dataValidado['corpo']) || empty($dataValidado['categoria']) || empty($dateValidado) || empty($autorValida))
        {
            $this->msgErro = "Favor preencher todos os campos !";
        }
        else
        {
            $sql = $this->db->prepare("INSERT INTO noticias SET titulo = :titulo, corpo = :corpo, categoria = :categoria, autor = :id_autor, data_noticia = :data_noticia");

            try {
                $sql->bindValue(":titulo", $dataValidado['titulo']);
                $sql->bindValue(":corpo", $dataValidado['corpo']);
                $sql->bindValue(":categoria", $dataValidado['categoria']);
                $sql->bindValue(":id_autor", $autorValida);
                $sql->bindValue(":data_noticia", $dateValidado);
                $sql->execute();

                $this->msgSucess = "Notícia foi salva com sucesso !";

                return true;
            } 
            catch (PDOException $e) 
            {
                die($e->getMessage());
                return false;
            }
        }
    }

    public function pesquisaNoticia($data)
    {
        //Validando os dados
        $dataValidado = $this->valida->validaFrom($data);
        //Validando a data
        $data_noticia_inicio = $this->valida->validaData($data['data_noticia_inicio']);
        $data_noticia_fim = $this->valida->validaData($data['data_noticia_fim']);

        //Inicio da Query base
        $queryData = "SELECT noticias.*, autores.nome_autor 
        FROM noticias
        INNER JOIN autores
        ON noticias.autor = autores.id_autor
        WHERE id != 0 ";

        //Limpando indices vazios
        $data = array_filter($dataValidado); //elimina todos valores vazios

        //Verifico se foi preechido algum campo
        if (!empty($data) && is_array($data)) :

            //Verifica se tem alguma data preechida
            if (!empty($data_noticia_inicio) || !empty($data_noticia_fim))
            {   
                //Caso seja preechido somente a data inicial, faz com que seja a mesma data no fim para realizar a consulta
                $data_noticia_inicio = empty(trim($data_noticia_inicio))? $data_noticia_fim : $data_noticia_inicio;
                //Caso seja preechido somente a data fim, faz com que seja a mesma data no inicio para realizar a consulta
                $data_noticia_fim = empty(trim($data_noticia_fim))? $data_noticia_inicio : $data_noticia_fim;
                //Se tiver data preenchida, inicio a query com os paramentos para fazer a busca com a data
                $queryInicio = " AND (CAST(noticias.data_noticia as DATE) BETWEEN :data_noticia_inicio AND :data_noticia_fim) ";
            }

                unset($data['data_noticia_inicio']);
                unset($data['data_noticia_fim']);

                //inica a variavel
                $place = array();

                //Faz o laço para fazer a busca de acordo com que foi preenchido
                foreach ($data as $key => $value)
                {
                    if ($key == 'titulo') 
                    {
                        $place[] = $key . " LIKE :" . $key;
                        $data[$key] = "%" . $value . "%";
                    } 
                    
                    else 
                    {
                        $place[] = $key . " = :" . $key;
                    }
                }

            //Verifica se tem a query inicio preechida a cima
            if (!empty($queryInicio))
            {
                
                //se tiver o query inicio eles tem que ter
                $data['data_noticia_inicio'] = $data_noticia_inicio;
                $data['data_noticia_fim'] = $data_noticia_fim;
                //Junto com a query base com a data
                $queryData .= $queryInicio;
            }
            //Verifica se ta preechido o laço
            if (!empty($place))
            {
                $queryData .= ' AND ' . implode(' AND ', $place);
            }

            /* echo $queryData;
            print_r($data); */

            $pesquisa = $this->db->prepare($queryData);
            $pesquisa->execute($data);

            if ($pesquisa->rowCount() > 0)
            {
                //print_r($pesquisa->fetchAll());

                $resultados = $pesquisa->fetchAll();

                $results = '';

                //print_r($resultados);
                foreach ($resultados as $key => $value) {
                    $this->pesqNoticia .= "
                        <tr>
                            <td>{$value['titulo']}</td>
                            <td>{$value['categoria']}</td>
                            <td>{$value['nome_autor']}</td>
                            <td>{$value['data_noticia']}</td>
                            <td>
                                <a href='" . BASE . "noticias/acesso/{$value['id']}' class='btn-floating btn-small waves-effect waves-light btn-color '><i class='material-icons'>send</i></a>
                            </td>
                        </tr>
                        ";
                }
                return true;
            } 
            else
            {
                //caso procure sem preencher os dados
                $this->msgErro = "Nenhuma notícia encontrada com os dados preechido !";
                return false;
            } 
        else :
            //nenhum campo preenchido
            $this->msgErro = "Favor preencher os campos para pesquisa !";
            return false;
        endif;
               
    
    }

}