<?php
    session_start();
    include_once ("../../../server/Connect.php");
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

        /* CEP */
        $cep = preg_replace("/[^0-9]/", "", $resultDados['CEP_CLIENTES']);
        $resultDados['CEP_CLIENTES'] = str_pad($cep, 8, '0', STR_PAD_LEFT);

        if (in_array('', $resultDados)):
            $erro = true;
            $mensagem = "Necessário preencher todos os campos";

         /* COMPLEMENTO CLIENTES */
        elseif (!preg_match("#[a-z]+#", $resultDados['COMPLEMENTO_CLIENTES'])):
            $erro = true;
            $mensagem = "O campo COMPLEMENTO CLIENTES precisa de pelo menos uma letra minuscula";
        
        elseif (stristr($resultDados['COMPLEMENTO_CLIENTES'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no COMPLEMENTO CLIENTES é inválido";

        elseif ((strlen($resultDados['COMPLEMENTO_CLIENTES'])) <= 3):
            $erro = true;
            $mensagem = "COMPLEMENTO CLIENTES deve ter no minímo 5";

        /* CEP CLIENTES */
        elseif (!preg_match("#[0-9]+#", $resultDados['CEP_CLIENTES'])):
            $erro = true;
            $mensagem = "O CEP CLIENTES deve incluir pelo menos um número!";
        
        elseif (stristr($resultDados['CEP_CLIENTES'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no CEP CLIENTES é inválido";
        
        elseif(!is_numeric($resultDados['CEP_CLIENTES'])):
            $erro = true;
            $mensagem = "CEP CLIENTES somente numeros";
        
        elseif (((strlen($resultDados['CEP_CLIENTES'])) < 8)):
            $erro = true;
            $mensagem = " CEP CLIENTES deve ter no minímo 8 caracteres";
        
        /* CIDADE CLIENTES */
        elseif (!preg_match("#[a-z]+#", $resultDados['CIDADE_CLIENTES'])):
            $erro = true;
            $mensagem = "O campo CIDADE CLIENTES precisa de pelo menos uma letra minuscula";
        
        elseif (stristr($resultDados['CIDADE_CLIENTES'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no CIDADE CLIENTES é inválido";

        elseif ((strlen($resultDados['CIDADE_CLIENTES'])) <= 2):
            $erro = true;
            $mensagem = "CIDADE CLIENTES deve ter no minímo 2";

        /* ESTADO CLIENTES */
        elseif (!preg_match("#[A-Z]+#", $resultDados['ESTADO_CLIENTES'])):
            $erro = true;
            $mensagem = "O campo ESTADO CLIENTES precisa de pelo menos uma letra minuscula";
        
        elseif (stristr($resultDados['ESTADO_CLIENTES'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no ESTADO CLIENTES é inválido";

        elseif ((strlen($resultDados['ESTADO_CLIENTES'])) < 2):
            $erro = true;
            $mensagem = "ESTADO CLIENTES deve ter no minímo 2";

        /* ENDERECO CLIENTES */
        elseif (!preg_match("#[a-z]+#", $resultDados['ENDERECO_CLIENTES'])):
            $erro = true;
            $mensagem = "O campo ENDERECO CLIENTES precisa de pelo menos uma letra minuscula";
        
        elseif (stristr($resultDados['ENDERECO_CLIENTES'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no ENDERECO CLIENTES é inválido";

        elseif ((strlen($resultDados['ENDERECO_CLIENTES'])) <= 5):
            $erro = true;
            $mensagem = "ENDERECO CLIENTES deve ter no minímo 5";

        /* NUMERO CLIENTES */
        elseif (!preg_match("#[0-9]+#", $resultDados['NUMERO_CLIENTES'])):
            $erro = true;
            $mensagem = "O NUMERO CLIENTES deve incluir pelo menos um número!";
        
        elseif (stristr($resultDados['NUMERO_CLIENTES'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no NUMERO CLIENTES é inválido";
        
        elseif(!is_numeric($resultDados['NUMERO_CLIENTES'])):
            $erro = true;
            $mensagem = "NUMERO CLIENTES somente numeros";
        
        elseif (((strlen($resultDados['NUMERO_CLIENTES'])) < 1)):
            $erro = true;
            $mensagem = " NUMERO CLIENTES deve ter no minímo 1 caracteres";

        /* BAIRRO CLIENTES */
        elseif (!preg_match("#[a-z]+#", $resultDados['BAIRRO_CLIENTES'])):
            $erro = true;
            $mensagem = "O campo BAIRRO CLIENTES precisa de pelo menos uma letra minuscula";
        
        elseif (stristr($resultDados['BAIRRO_CLIENTES'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no BAIRRO CLIENTES é inválido";

        elseif ((strlen($resultDados['BAIRRO_CLIENTES'])) <= 5):
            $erro = true;
            $mensagem = "BAIRRO CLIENTES deve ter no minímo 5";

        endif;

        if (!$erro):

            try {
                $sql = "UPDATE clientes SET CEP_CLIENTES = :CEP_CLIENTES, ESTADO_CLIENTES = :ESTADO_CLIENTES, CIDADE_CLIENTES = :CIDADE_CLIENTES, ENDERECO_CLIENTES = :ENDERECO_CLIENTES, NUMERO_CLIENTES = :NUMERO_CLIENTES, BAIRRO_CLIENTES = :BAIRRO_CLIENTES,  COMPLEMENTO_CLIENTES = :COMPLEMENTO_CLIENTES  WHERE ID_CLIENTES = :ID_CLIENTES";

                $user_data = array(
                    ':ID_CLIENTES'                  => $resultDados['ID_CLIENTES'],
                    ':CEP_CLIENTES'                 => $resultDados["CEP_CLIENTES"],
                    ':CIDADE_CLIENTES'              => $resultDados["CIDADE_CLIENTES"],
                    ':ESTADO_CLIENTES'              => $resultDados["ESTADO_CLIENTES"],
                    ':ENDERECO_CLIENTES'            => $resultDados["ENDERECO_CLIENTES"],
                    ':NUMERO_CLIENTES'              => $resultDados['NUMERO_CLIENTES'],
                    ':BAIRRO_CLIENTES'              => $resultDados["BAIRRO_CLIENTES"],
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
