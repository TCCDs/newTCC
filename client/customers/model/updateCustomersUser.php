<?php
    session_start();
    include_once ("../../../server/Connect.php");
    include_once ("../../../validacao/validacaoCpf.php");
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

        /* CPF */
        $cpf = preg_replace("/[^0-9]/", "", $resultDados['CPF_CLIENTES']);
        $resultDados['CPF_CLIENTES'] = str_pad($cpf, 11, '0', STR_PAD_LEFT);
        /* RG */
        $rg = preg_replace("/[^0-9]/", "", $resultDados['RG_CLIENTES']);
        $resultDados['RG_CLIENTES'] = str_pad($rg, 9, '0', STR_PAD_LEFT);
        /* CELULAR */
        $celular = preg_replace("/[^0-9]/", "", $resultDados['CELULAR_CLIENTES']);
        $resultDados['CELULAR_CLIENTES'] = str_pad($celular, 11, '0', STR_PAD_LEFT);
        /* CEP */
        $cep = preg_replace("/[^0-9]/", "", $resultDados['CEP_CLIENTES']);
        $resultDados['CEP_CLIENTES'] = str_pad($cep, 8, '0', STR_PAD_LEFT);
        /* IDADE */
        $validade = explode('/', $resultDados['DATA_NASCIMENTO_CLIENTES']);
        $dataImplode = implode("-",$validade);
        $data = date_create($dataImplode);
        $idade = date_format($data, "Y-m-d");
        $data_atual = date('Y-m-d');
        $resultDados['DATA_NASCIMENTO_CLIENTES'] = $data_atual - $idade;
        /* CPF */
        $valida = validaCPF($resultDados['CPF_CLIENTES']);

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

        elseif ((strlen($resultDados['SEXO_CLIENTES'])) >= 8 && 9 <= strlen($resultDados['SEXO_CLIENTES'])):
            $erro = true;
            $mensagem = "SEXO CLIENTES deve ter no minímo 8  e maximo 9";
        
        /* DATA_NASCIMENTO_CLIENTES */
        elseif (!checkdate($validade[1], $validade[0], $validade[2])):
            $erro = true;
            $mensagem = "DATA INVALIDA";

        elseif ($resultDados['DATA_NASCIMENTO_CLIENTES'] < 18):
            $erro = true;
            $mensagem = "Somente para maiores de 18 anos";

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
        
        elseif ((strlen($resultDados['CELULAR_CLIENTES'])) < 11):
            $erro = true;
            $mensagem = " CELULAR CLIENTES deve ter no maximo 11";
        
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
            $sql = "SELECT ID_CLIENTES FROM clientes WHERE clientes.CPF_CLIENTES = :CPF_CLIENTES ";
            $resultado = $conn->getConn()->prepare($sql);
            $resultado->bindParam(':CPF_CLIENTES', $resultDados['CPF_CLIENTES']);
            $resultado->execute();

		    if(($resultado) AND ($resultado->rowCount() != 0)):
			    $erro = true;
			    $mensagem = "Este CPF já está sendo utilizado";
            endif;

            $sql = "SELECT ID_CLIENTES FROM clientes WHERE clientes.EMAIL_CLIENTES = :EMAIL_CLIENTES ";
            $resultado = $conn->getConn()->prepare($sql);
            $resultado->bindParam(':EMAIL_CLIENTES', $resultDados['EMAIL_CLIENTES']);
            $resultado->execute();

		    if(($resultado) AND ($resultado->rowCount() != 0)):
			    $erro = true;
			    $mensagem = "Este e-mail já está sendo utilizado";
            endif;
        endif;

        if (!$erro):

            try {
                $sql = "UPDATE clientes SET NOME_CLIENTES = :NOME_CLIENTES, CPF_CLIENTES = :CPF_CLIENTES, RG_CLIENTES = :RG_CLIENTES, DATA_NASCIMENTO_CLIENTES = :DATA_NASCIMENTO_CLIENTES, SEXO_CLIENTES = :SEXO_CLIENTES, NACIONALIDADE_CLIENTES = :NACIONALIDADE_CLIENTES, CELULAR_CLIENTES = :CELULAR_CLIENTES  WHERE ID_CLIENTES = :ID_CLIENTES";

                $user_data = array(
                    ':NOME_CLIENTES'                => $resultDados["NOME_CLIENTES"],
                    ':RG_CLIENTES'                  => $resultDados["RG_CLIENTES"],
                    ':CPF_CLIENTES'                 => $resultDados["CPF_CLIENTES"],
                    ':SEXO_CLIENTES'                => $resultDados["SEXO_CLIENTES"],
                    ':DATA_NASCIMENTO_CLIENTES'     => $resultDados['DATA_NASCIMENTO_CLIENTES'],
                    ':CELULAR_CLIENTES'             => $resultDados["CELULAR_CLIENTES"],
                    ':NACIONALIDADE_CLIENTES'       => $resultDados["NACIONALIDADE_CLIENTES"],
                    ':ID_CLIENTES'                  => $resultDados["ID_CLIENTES"]
                );

                $resultado = $conn->getConn()->prepare($sql);
                $resultado->execute($user_data);
                
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
