<?php
    function Conectar(){
        try{
            $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
            $con = new PDO("mysql:host=localhost; dbname=new_supermercado;", "root", "", $opcoes);
            return $con;
        } catch (Exception $e){
            echo 'Erro: '.$e->getMessage();
            return null;
        }
    }

    $opcao = isset($_GET['opcao']) ? $_GET['opcao'] : '';

    if (! empty($opcao)){   
        switch ($opcao){
            case 'fornecedores':
                {
                    echo getAllFornecedores();
                    break;
                }
            case 'marca':
                {
                    echo getFilterMarca();
                    break;
                }
        }
    }

    function getAllFornecedores(){
        $pdo = Conectar();
        $sql = 'SELECT ID_FORNECEDORES, NOME_FANTASIA_FORNECEDORES FROM fornecedores';
        $stm = $pdo->prepare($sql);
        $stm->execute();
        sleep(1);
        echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
        $pdo = null;    
    }

    function getFilterMarca(){
        $pdo = Conectar();
        $sql = 'SELECT ID_MARCA, NOME_MARCA FROM marca';
        $stm = $pdo->prepare($sql);
        $stm->execute();
        sleep(1);
        echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
        $pdo = null;    
    }

?>