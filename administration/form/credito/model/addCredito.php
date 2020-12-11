<?php
    session_start();
    include_once ("../../../../server/Connect.php");
    $conn = new Conn();

    $saldo = 0.00;

        try{
            $sql = "INSERT INTO saldo_clientes (ID_CLIENTE, SALDO_CLIENTES)
                    VALUES (:ID_CLIENTE, :SALDO_CLIENTES)
                ";

        $user_data = array(
            ':ID_CLIENTE'       => $_SESSION['ID_CLIENTE'],
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
            $mensagem = "Erro ao cadastrar usuário";
            
            $data = array(
                'mensagem' => $mensagem
            );

        }

    echo json_encode($data);
?>