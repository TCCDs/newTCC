<?php

    //$connect = new PDO("mysql:host=localhost;dbname=new_supermercado", "root", "");
    include_once('../../../../server/Conn.php');
    $conn = new Conn();
        
    $codigoMarca = mt_rand();

    if(isset($_POST["NOME_MARCA"])) {
        try{
            $sql = "INSERT INTO marca (NOME_MARCA, CODIGO_MARCA)
                        VALUES (:NOME_MARCA, :CODIGO_MARCA)
            ";

            $user_data = array(
                ':NOME_MARCA'  => $_POST["NOME_MARCA"],
                ':CODIGO_MARCA' => $codigoMarca

            );

            /*$statement = $connect->prepare($query);
            $statement->execute($user_data);*/

            $resultado = $conn->getConn()->prepare($sql);
            $resultado->execute($user_data);

            $data = array('return' => true);

        } catch (Exception $ex){
            $data = array('return' => $ex->getMessage());
        }
            echo json_encode($data);
    }
?>
