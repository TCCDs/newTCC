<?php
    session_start();
    include_once('../../../../server/Connect.php');
    $conn = new Conn();

    $id = $_POST["txtId"];
    $titulo = $_POST["txtTitulo"];
    $slug = $_POST["txtSlug"];

    if(isset($titulo) && isset($slug)) {

        try{
        $sql = "UPDATE receita_categoria SET titulo = :titulo, slug = :slug WHERE id = :id";

        $user_data = array(
            ':titulo'  => $titulo,
            ':slug'  => $slug,
            ':id' => $id
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