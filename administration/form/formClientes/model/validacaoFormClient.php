<?php
    session_start();
    include_once ("../../../../server/Connect.php");
    include_once ("../model/validacaoCpf.php");
    $conn = new Conn();

    $requestData = $_REQUEST;

    if ($requestData):
        $erro = false;
        $mensagem = '';

        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);;

        $dados_st = array_map('strip_tags', $dados);
        $dados_strc = array_map('stripcslashes', $dados_st);
        $dados_strs = array_map('stripslashes', $dados_strc);
        $resultDados = array_map('trim', $dados_strs);

        print_r($resultDados);
        $valida = validaCPF($resultDados['CPF_CLIENTES']);

        exit;

        if (in_array('', $resultDados)):
            $erro = true;
            $mensagem = "Necessário preencher todos os campos";

        /* NOME CLIENTES */
        elseif (!preg_match("#[a-z]+#", $resultDados['NOME_CLIENTES'])):
            $erro = true;
            $mensagem = "O campo NOME CLIENTES precisa de pelo menos uma letra minuscula";
        
        elseif (stristr($resultDados['NOME_CLIENTES'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no NOME CLIENTES é inválido";

        elseif ((strlen($resultDados['NOME_CLIENTES'])) <= 5):
            $erro = true;
            $mensagem = "NOME CLIENTES deve ter no minímo 5";

        /* RG CLIENTES */
        elseif (!preg_match("#[0-9]+#", $resultDados['RG_CLIENTES'])):
            $erro = true;
            $mensagem = "O RG CLIENTES deve incluir pelo menos um número!";
        
        elseif (stristr($resultDados['RG_CLIENTES'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no RG CLIENTES é inválido";
        
        elseif(!is_numeric($resultDados['RG_CLIENTES'])):
            $erro = true;
            $mensagem = "RG CLIENTES somente numeros";
        
        elseif (((strlen($resultDados['RG_CLIENTES'])) < 9)):
            $erro = true;
            $mensagem = " RG CLIENTES  deve ter no minímo 9 caracteres";

        /* CPF CLIENTES */
        elseif (!preg_match("#[0-9]+#", $resultDados['CPF_CLIENTES'])):
            $erro = true;
            $mensagem = "O CPF CLIENTES deve incluir pelo menos um número!";
        
        elseif (stristr($resultDados['CPF_CLIENTES'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no CPF CLIENTES é inválido";
        
        elseif(!is_numeric($resultDados['CPF_CLIENTES'])):
            $erro = true;
            $mensagem = "CPF CLIENTES somente numeros";
        
        elseif ($valida === false):
            $erro = true;
            $mensagem = " CPF CLIENTES invalido";
        
        /* SEXO CLIENTES */
        elseif (!preg_match("#[a-z]+#", $resultDados['SEXO_CLIENTES'])):
            $erro = true;
            $mensagem = "O campo SEXO CLIENTES precisa de pelo menos uma letra minuscula";
        
        elseif (stristr($resultDados['SEXO_CLIENTES'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no SEXO CLIENTES é inválido";

        elseif ((strlen($resultDados['SENHA_USUARIOS'])) >= 8 && 9 <= strlen($resultDados['SENHA_USUARIOS'])):
            $erro = true;
            $mensagem = "SEXO CLIENTES deve ter no minímo 8  e maximo 9";
            
        /* CELULAR CLIENTES */
        elseif (!preg_match("#[0-9]+#", $resultDados['CELULAR_CLIENTES'])):
            $erro = true;
            $mensagem = "O CELULAR CLIENTES deve incluir pelo menos um número!";
        
        elseif (stristr($resultDados['CELULAR_CLIENTES'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no CELULAR CLIENTES é inválido";
        
        elseif(!is_numeric($resultDados['CELULAR_CLIENTES'])):
            $erro = true;
            $mensagem = "CELULAR CLIENTES somente numeros";
        
        elseif ((strlen($resultDados['CELULAR_CLIENTES'])) >= 11 && 11 <= strlen($resultDados['SENHA_USUARIOS'])):
            $erro = true;
            $mensagem = " CELULAR CLIENTES deve ter no maximo 11";
        
        /* EMAIL CLIENTES */
        elseif (!preg_match("#[a-z]+#", $resultDados['EMAIL_CLIENTES'])):
            $erro = true;
            $mensagem = "O campo EMAIL CLIENTES precisa de pelo menos uma letra minuscula";
        
        elseif (stristr($resultDados['EMAIL_CLIENTES'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no EMAIL CLIENTES é inválido";

        elseif ((!isset ($resultDados['EMAIL_CLIENTES']) || !filter_var($resultDados['EMAIL_CLIENTES'], FILTER_VALIDATE_EMAIL)) && !$erro):
            $erro = true;
            $mensagem = "O campo EMAIL CLIENTES precisa de um endereço valido";

        /* NACIONALIDADE CLIENTES */
        elseif (!preg_match("#[a-z]+#", $resultDados['NACIONALIDADE_CLIENTES'])):
            $erro = true;
            $mensagem = "O campo NACIONALIDADE CLIENTES precisa de pelo menos uma letra minuscula";
        
        elseif (stristr($resultDados['NACIONALIDADE_CLIENTES'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no NACIONALIDADE CLIENTES é inválido";

        elseif ((strlen($resultDados['NACIONALIDADE_CLIENTES'])) <= 5):
            $erro = true;
            $mensagem = "NACIONALIDADE CLIENTES deve ter no minímo 5";
        
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
                $sql = "INSERT INTO clientes (ID_USUARIOS, NOME_CLIENTES, RG_CLIENTES, CPF_CLIENTES, SEXO_CLIENTES, DATA_NASCIMENTO_CLIENTES, EMAIL_CLIENTES, CELULAR_CLIENTES, CEP_CLIENTES, CIDADE_CLIENTES, ESTADO_CLIENTES, ENDERECO_CLIENTES, NUMERO_CLIENTES, BAIRRO_CLIENTES, NACIONALIDADE_CLIENTES, COMPLEMENTO_CLIENTES)
                VALUES (:ID_USUARIOS, :NOME_CLIENTES, :RG_CLIENTES, :CPF_CLIENTES, :SEXO_CLIENTES, :DATA_NASCIMENTO_CLIENTES, :EMAIL_CLIENTES, :CELULAR_CLIENTES, :CEP_CLIENTES, :CIDADE_CLIENTES, :ESTADO_CLIENTES, :ENDERECO_CLIENTES, :NUMERO_CLIENTES, :BAIRRO_CLIENTES, :NACIONALIDADE_CLIENTES, :COMPLEMENTO_CLIENTES)
                    ";
    
            $password_hash = password_hash($resultDados['SENHA_USUARIOS'], PASSWORD_DEFAULT);
    
            $user_data = array(
                ':ID_USUARIOS'                  => $_SESSION['idUsuario'],
                ':NOME_CLIENTES'                => $resultDados["NOME_CLIENTES"],
                ':RG_CLIENTES'                  => $resultDados["RG_CLIENTES"],
                ':CPF_CLIENTES'                 => $resultDados["CPF_CLIENTES"],
                ':SEXO_CLIENTES'                => $resultDados["SEXO_CLIENTES"],
                ':DATA_NASCIMENTO_CLIENTES'     => $resultDados['DATA_NASCIMENTO_CLIENTES'],
                ':EMAIL_CLIENTES'               => $resultDados["EMAIL_CLIENTES"],
                ':CELULAR_CLIENTES'             => $resultDados["CELULAR_CLIENTES"],
                ':CEP_CLIENTES'                 => $resultDados["CEP_CLIENTES"],
                ':CIDADE_CLIENTES'              => $resultDados["CIDADE_CLIENTES"],
                ':ESTADO_CLIENTES'              => $resultDados["ESTADO_CLIENTES"],
                ':ENDERECO_CLIENTES'            => $resultDados["ENDERECO_CLIENTES"],
                ':NUMERO_CLIENTES'              => $resultDados['NUMERO_CLIENTES'],
                ':BAIRRO_CLIENTES'              => $resultDados["BAIRRO_CLIENTES"],
                ':NACIONALIDADE_CLIENTES'       => $resultDados["NACIONALIDADE_CLIENTES"],
                ':COMPLEMENTO_CLIENTES'         => $resultDados["COMPLEMENTO_CLIENTES"]
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