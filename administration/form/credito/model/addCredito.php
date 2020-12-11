<?php
    session_start();
    include_once ("../../../../server/Connect.php");
    $conn = new Conn();

    $saldo = 0.00;

        try{
            $sql = "INSERT INTO saldo_clientes (ID_CLIENTE, SALDO_CLIENTES)
                    VALUES (:ID_CLIENTE, :SALDO_CLIENTES)
                ";

        $password_hash = password_hash($resultDados['SENHA_USUARIOS'], PASSWORD_DEFAULT);

        $user_data = array(
            ':ID_CLIENTE'       => $resultDados['ID_CLIENTE'],
            ':SALDO_CLIENTES'   => $saldo
        );

        $resultado = $conn->getConn()->prepare($sql);
        $resultado->execute($user_data);

        $mensagem = "Cadastro efetuado com sucesso!";

        $data = array(
            'return' => true,
            'mensagem' => $mensagem
        );

        } catch (Exception $ex){
            //$data = array('return' => $ex->getMessage());
            $mensagem = "Erro ao cadastrar usuário";
            
            $data = array(
                'mensagem' => $mensagem
            );

        }

    echo json_encode($data);
?>