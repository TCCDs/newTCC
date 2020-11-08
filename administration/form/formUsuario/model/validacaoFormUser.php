<?php
    session_start();
    include_once ("../../../../server/Connect.php");
    $conn = new Conn();

    $tipoUsuarios = 1;
    $requestData = $_REQUEST;

    if ($requestData):
        $erro = false;
        $mensagem = '';

        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        $dados_st = array_map('strip_tags', $dados);
        $dados_strc = array_map('stripcslashes', $dados_st);
        $dados_strs = array_map('stripslashes', $dados_strc);
        $resultDados = array_map('trim', $dados_strs);

        if (in_array('', $resultDados)):
            $erro = true;
            $mensagem = "Necessário preencher todos os campos";

        elseif ((!isset ($resultDados['LOGIN_USUARIOS']) || !filter_var($resultDados['LOGIN_USUARIOS'], FILTER_VALIDATE_EMAIL)) && !$erro):
            $erro = true;
            $mensagem = "O campo email precisa de um endereço valido";

        elseif ((strlen($resultDados['SENHA_USUARIOS'])) >= 8 && 16 <= strlen($resultDados['SENHA_USUARIOS'])):
            $erro = true;
            $mensagem = "A senha deve ter no minímo 8 caracteres e no maximo 16";

        elseif (stristr($resultDados['SENHA_USUARIOS'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado na senha é inválido";

        elseif (!preg_match("#[0-9]+#", $resultDados['SENHA_USUARIOS'])):
            $erro = true;
            $mensagem = "A senha deve incluir pelo menos um número!";

        elseif (!preg_match("#[a-z]+#", $resultDados['SENHA_USUARIOS'])):
            $erro = true;
            $mensagem = "A senha deve incluir pelo menos uma letra minuscula!";
                
        elseif (!preg_match("#[A-Z]+#", $resultDados['SENHA_USUARIOS'])):
            $erro = true;
            $mensagem = "A senha deve incluir pelo menos um letra maiuscula!";
        
        else:
            $sql = "SELECT ID_USUARIOS FROM login_usuarios WHERE LOGIN_USUARIOS = :LOGIN_USUARIOS ";
            $resultado = $conn->getConn()->prepare($sql);
            $resultado->bindParam(':LOGIN_USUARIOS', $resultDados['LOGIN_USUARIOS']);
            $resultado->execute();

		    if(($resultado) AND ($resultado->rowCount() != 0)){
			    $erro = true;
			    $mensagem = "Este e-mail já está cadastrado";
            }
        endif;

        if (!$erro):
            try{
                $sql = "INSERT INTO login_usuarios (LOGIN_USUARIOS, SENHA_USUARIOS, TIPO_USUARIOS)
                        VALUES (:LOGIN_USUARIOS, :SENHA_USUARIOS, :TIPO_USUARIOS)
                    ";
    
            $password_hash = password_hash($resultDados['SENHA_USUARIOS'], PASSWORD_DEFAULT);
    
            $user_data = array(
                ':LOGIN_USUARIOS'  => $resultDados['LOGIN_USUARIOS'],
                ':SENHA_USUARIOS'  => $password_hash,
                ':TIPO_USUARIOS'   => $tipoUsuarios
            );
    
            $resultado = $conn->getConn()->prepare($sql);
            $resultado->execute($user_data);
            $idUsuario = $conn->getConn()->lastInsertId();
    
            $_SESSION['idUsuario'] = $idUsuario;
    
            $mensagem = "Cadastro efetuado com sucesso!";

            $data = array(
                'return' => true,
                'mensagem' => $mensagem
            );
    
            } catch (Exception $ex){
                //$data = array('return' => $ex->getMessage());
                $mensagem = "Erro ao cadastrar usuario";
                
                $data = array(
                    'mensagem' => $mensagem
                );

            }

        else:
            $data = array('mensagem' => $mensagem);
        endif;
    endif;

    echo json_encode($data);
?>