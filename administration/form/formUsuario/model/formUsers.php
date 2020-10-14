<?php
session_start();
    //$connect = new PDO("mysql:host=localhost;dbname=new_supermercado", "root", "");
    include_once('../../../../server/Connect.php');
    $conn = new Conn();

    $tipoUsuarios = 1;

    if(isset($_POST["LOGIN_USUARIOS"]) && isset($_POST["SENHA_USUARIOS"])) {

        try{
        $sql = "INSERT INTO login_usuarios (LOGIN_USUARIOS, SENHA_USUARIOS, TIPO_USUARIOS)
                    VALUES (:LOGIN_USUARIOS, :SENHA_USUARIOS, :TIPO_USUARIOS)
        ";

        $password_hash = password_hash($_POST["SENHA_USUARIOS"], PASSWORD_DEFAULT);

        $user_data = array(
            ':LOGIN_USUARIOS'  => $_POST["LOGIN_USUARIOS"],
            ':SENHA_USUARIOS'  => $password_hash,
            ':TIPO_USUARIOS'   => $tipoUsuarios
        );

        /*$statement = $connect->prepare($query);
        $statement->execute($user_data);
        $idUsuario = $connect->lastInsertId();*/

        $resultado = $conn->getConn()->prepare($sql);
        $resultado->execute($user_data);
        $idUsuario = $conn->getConn()->lastInsertId();

        $_SESSION['idUsuario'] = $idUsuario;

        $data = array('return' => true);

        } catch (Exception $ex){
            $data = array('return' => $ex->getMessage());
        }
            echo json_encode($data);
    }
?>