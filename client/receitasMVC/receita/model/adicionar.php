<?php
    session_start();
    include_once('../../../../server/Connect.php');
    $conn = new Conn();

    $categoriaid = 5;
    $titulo = $_POST["txtTitulo"];
    $slug = $_POST["txtSlug"];
    $linha_fina =  $_POST["txtLinhaFina"];
    $descricao = $_POST["txtDescricao"];
    $thumb = $_POST["txtThumb"];

    if(isset($titulo) && isset($slug)) {

        try{
        $sql = "INSERT INTO receita (titulo, slug, linha_fina, descricao, categoria_id, thumb) 
                    VALUES (:titulo, :slug, :linha_fina, :descricao, :categoriaid, :thumb)
        ";

        $user_data = array(
            ':titulo'  => $titulo,
            ':slug'  => $slug,
            ':linha_fina'   => $linha_fina,
            ':descricao'  => $descricao,
            ':categoriaid'  => $categoriaid,
            ':thumb'   => $thumb
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