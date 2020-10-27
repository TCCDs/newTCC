<?php
    session_start();
    include_once('../../../../server/Conn.php');
    $conn = new Conn();

    $titulo = $_POST["txtTitulo"];
    $slug = $_POST["txtSlug"];

    if(isset($titulo) && isset($slug)) {

        try{
        $sql = "INSERT INTO receita_categoria (titulo, slug) 
                    VALUES (:titulo, :slug)
        ";

        $user_data = array(
            ':titulo'  => $titulo,
            ':slug'  => $slug
        );

        $resultado = $conn->getConn()->prepare($sql);
        $resultado->execute($user_data);
        $idUsuario = $conn->getConn()->lastInsertId();

        $data = array('return' => true);

        } catch (Exception $ex){
            $data = array('return' => $ex->getMessage());
        }
            echo json_encode($data);
    }
?>