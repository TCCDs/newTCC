<?php
    session_start();
    include_once ("../../../server/Connect.php");
    include_once ("../../../validacao/validacaoCnpj.php");
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

        /* CNPJ */
        $cnpj = preg_replace("/[^0-9]/", "", $resultDados['CNPJ_FORNECEDORES']);
        $resultDados['CNPJ_FORNECEDORES'] = str_pad($cnpj, 14, '0', STR_PAD_LEFT);

        /* CELULAR */
        $celular = preg_replace("/[^0-9]/", "", $resultDados['CELULAR_FORNECEDORES']);
        $resultDados['CELULAR_FORNECEDORES'] = str_pad($celular, 11, '0', STR_PAD_LEFT);

        /* CEP */
        $cep = preg_replace("/[^0-9]/", "", $resultDados['CEP_FORNECEDORES']);
        $resultDados['CEP_FORNECEDORES'] = str_pad($cep, 8, '0', STR_PAD_LEFT);

        /* IDADE */
        $validade = explode('/', $resultDados['DATA_NASCIMENTO_FORNECEDORES']);
        $dataImplode = implode("-",$validade);
        $data = date_create($dataImplode);
        $idade = date_format($data, "Y-m-d");
        $data_atual = date('Y-m-d');
        $resultDados['DATA_NASCIMENTO_FORNECEDORES'] = $data_atual - $idade;

        /* CNPJ */
        $valida = valida_cnpj($resultDados['CNPJ_FORNECEDORES']);

        if (in_array('', $resultDados)):
            $erro = true;
            $mensagem = "Necessário preencher todos os campos";

        /* NOME FANTASIA FORNECEDORES */
        elseif (!preg_match("#[a-z]+#", $resultDados['NOME_FANTASIA_FORNECEDORES'])):
            $erro = true;
            $mensagem = "O campo NOME FANTASIA FORNECEDORES precisa de pelo menos uma letra minuscula";
        
        elseif (stristr($resultDados['NOME_FANTASIA_FORNECEDORES'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no NOME FANTASIA FORNECEDORES é inválido";

        elseif ((strlen($resultDados['NOME_FANTASIA_FORNECEDORES'])) <= 5):
            $erro = true;
            $mensagem = "NOME FANTASIA FORNECEDORES deve ter no minímo 5";

        /* RAZAO SOCIAL FORNECEDORES */
        elseif (!preg_match("#[a-z]+#", $resultDados['RAZAO_SOCIAL_FORNECEDORES'])):
            $erro = true;
            $mensagem = "O campo RAZAO SOCIAL FORNECEDORES precisa de pelo menos uma letra minuscula";
        
        elseif (stristr($resultDados['RAZAO_SOCIAL_FORNECEDORES'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no RAZAO SOCIAL FORNECEDORES é inválido";

        elseif ((strlen($resultDados['RAZAO_SOCIAL_FORNECEDORES'])) <= 5):
            $erro = true;
            $mensagem = "RAZAO SOCIAL FORNECEDORES deve ter no minímo 5";

        /* CNPJ FORNECEDORES */
        elseif (!preg_match("#[0-9]+#", $resultDados['CNPJ_FORNECEDORES'])):
            $erro = true;
            $mensagem = "O CNPJ FORNECEDORES deve incluir pelo menos um número!";
        
        elseif (stristr($resultDados['CNPJ_FORNECEDORES'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no CNPJ FORNECEDORES é inválido";
        
        elseif(!is_numeric($resultDados['CNPJ_FORNECEDORES'])):
            $erro = true;
            $mensagem = "CNPJ FORNECEDORES somente numeros";
        
        elseif ($valida === false):
            $erro = true;
            $mensagem = " CNPJ FORNECEDORES invalido";

        /* EMAIL FORNECEDORES */
        elseif (!preg_match("#[a-z]+#", $resultDados['EMAIL_FORNECEDORES'])):
            $erro = true;
            $mensagem = "O campo EMAIL FORNECEDORES precisa de pelo menos uma letra minuscula";
        
        elseif (stristr($resultDados['EMAIL_FORNECEDORES'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no EMAIL FORNECEDORES é inválido";

        elseif ((!isset ($resultDados['EMAIL_FORNECEDORES']) || !filter_var($resultDados['EMAIL_FORNECEDORES'], FILTER_VALIDATE_EMAIL)) && !$erro):
            $erro = true;
            $mensagem = "O campo EMAIL FORNECEDORES precisa de um endereço valido";
        
        /* CELULAR FORNECEDORES */
        elseif (!preg_match("#[0-9]+#", $resultDados['CELULAR_FORNECEDORES'])):
            $erro = true;
            $mensagem = "O CELULAR FORNECEDORES deve incluir pelo menos um número!";
        
        elseif (stristr($resultDados['CELULAR_FORNECEDORES'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no CELULAR FORNECEDORES é inválido";
        
        elseif(!is_numeric($resultDados['CELULAR_FORNECEDORES'])):
            $erro = true;
            $mensagem = "CELULAR FORNECEDORES somente numeros";
        
        elseif ((strlen($resultDados['CELULAR_FORNECEDORES'])) < 11):
            $erro = true;
            $mensagem = " CELULAR FORNECEDORES deve ter no maximo 11";
        
        /* SEXO FORNECEDORES */
        elseif (!preg_match("#[a-z]+#", $resultDados['SEXO_FORNECEDORES'])):
            $erro = true;
            $mensagem = "O campo SEXO FORNECEDORES precisa de pelo menos uma letra minuscula";
        
        elseif (stristr($resultDados['SEXO_FORNECEDORES'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no SEXO FORNECEDORES é inválido";

        elseif ((strlen($resultDados['SEXO_FORNECEDORES'])) >= 8 && 9 <= strlen($resultDados['SEXO_FORNECEDORES'])):
            $erro = true;
            $mensagem = "SEXO FORNECEDORES deve ter no minímo 8  e maximo 9";
        
        /* DATA_NASCIMENTO_FORNECEDORES */
        elseif (!checkdate($validade[1], $validade[0], $validade[2])):
            $erro = true;
            $mensagem = "DATA INVALIDA";

        elseif ($resultDados['DATA_NASCIMENTO_FORNECEDORES'] < 18):
            $erro = true;
            $mensagem = "Somente para maiores de 18 anos";

        /* NACIONALIDADE FORNECEDORES */
        elseif (!preg_match("#[a-z]+#", $resultDados['NACIONALIDADE_FORNECEDORES'])):
            $erro = true;
            $mensagem = "O campo NACIONALIDADE FORNECEDORES precisa de pelo menos uma letra minuscula";
        
        elseif (stristr($resultDados['NACIONALIDADE_FORNECEDORES'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no NACIONALIDADE FORNECEDORES é inválido";

        elseif ((strlen($resultDados['NACIONALIDADE_FORNECEDORES'])) <= 5):
            $erro = true;
            $mensagem = "NACIONALIDADE FORNECEDORES deve ter no minímo 5";
        
        /* COMPLEMENTO FORNECEDORES */
        elseif (!preg_match("#[a-z]+#", $resultDados['COMPLEMENTO_FORNECEDORES'])):
            $erro = true;
            $mensagem = "O campo COMPLEMENTO FORNECEDORES precisa de pelo menos uma letra minuscula";
        
        elseif (stristr($resultDados['COMPLEMENTO_FORNECEDORES'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no COMPLEMENTO FORNECEDORES é inválido";

        elseif ((strlen($resultDados['COMPLEMENTO_FORNECEDORES'])) <= 3):
            $erro = true;
            $mensagem = "COMPLEMENTO FORNECEDORES deve ter no minímo 5";

        /* CEP FORNECEDORES */
        elseif (!preg_match("#[0-9]+#", $resultDados['CEP_FORNECEDORES'])):
            $erro = true;
            $mensagem = "O CEP FORNECEDORES deve incluir pelo menos um número!";
        
        elseif (stristr($resultDados['CEP_FORNECEDORES'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no CEP FORNECEDORES é inválido";
        
        elseif(!is_numeric($resultDados['CEP_FORNECEDORES'])):
            $erro = true;
            $mensagem = "CEP FORNECEDORES somente numeros";
        
        elseif (((strlen($resultDados['CEP_FORNECEDORES'])) < 8)):
            $erro = true;
            $mensagem = " CEP FORNECEDORES deve ter no minímo 8 caracteres";
        
        /* CIDADE FORNECEDORES */
        elseif (!preg_match("#[a-z]+#", $resultDados['CIDADE_FORNECEDORES'])):
            $erro = true;
            $mensagem = "O campo CIDADE FORNECEDORES precisa de pelo menos uma letra minuscula";
        
        elseif (stristr($resultDados['CIDADE_FORNECEDORES'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no CIDADE FORNECEDORES é inválido";

        elseif ((strlen($resultDados['CIDADE_FORNECEDORES'])) <= 2):
            $erro = true;
            $mensagem = "CIDADE FORNECEDORES deve ter no minímo 2";

        /* ESTADO FORNECEDORES */
        elseif (!preg_match("#[A-Z]+#", $resultDados['ESTADO_FORNECEDORES'])):
            $erro = true;
            $mensagem = "O campo ESTADO FORNECEDORES precisa de pelo menos uma letra minuscula";
        
        elseif (stristr($resultDados['ESTADO_FORNECEDORES'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no ESTADO FORNECEDORES é inválido";

        elseif ((strlen($resultDados['ESTADO_FORNECEDORES'])) < 2):
            $erro = true;
            $mensagem = "ESTADO FORNECEDORES deve ter no minímo 2";

        /* ENDERECO FORNECEDORES */
        elseif (!preg_match("#[a-z]+#", $resultDados['ENDERECO_FORNECEDORES'])):
            $erro = true;
            $mensagem = "O campo ENDERECO FORNECEDORES precisa de pelo menos uma letra minuscula";
        
        elseif (stristr($resultDados['ENDERECO_FORNECEDORES'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no ENDERECO FORNECEDORES é inválido";

        elseif ((strlen($resultDados['ENDERECO_FORNECEDORES'])) <= 5):
            $erro = true;
            $mensagem = "ENDERECO FORNECEDORES deve ter no minímo 5";

        /* NUMERO FORNECEDORES */
        elseif (!preg_match("#[0-9]+#", $resultDados['NUMERO_FORNECEDORES'])):
            $erro = true;
            $mensagem = "O NUMERO FORNECEDORES deve incluir pelo menos um número!";
        
        elseif (stristr($resultDados['NUMERO_FORNECEDORES'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no NUMERO FORNECEDORES é inválido";
        
        elseif(!is_numeric($resultDados['NUMERO_FORNECEDORES'])):
            $erro = true;
            $mensagem = "NUMERO FORNECEDORES somente numeros";
        
        elseif (((strlen($resultDados['NUMERO_FORNECEDORES'])) < 1)):
            $erro = true;
            $mensagem = " NUMERO FORNECEDORES deve ter no minímo 1 caracteres";

        /* BAIRRO FORNECEDORES */
        elseif (!preg_match("#[a-z]+#", $resultDados['BAIRRO_FORNECEDORES'])):
            $erro = true;
            $mensagem = "O campo BAIRRO FORNECEDORES precisa de pelo menos uma letra minuscula";
        
        elseif (stristr($resultDados['BAIRRO_FORNECEDORES'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no BAIRRO FORNECEDORES é inválido";

        elseif ((strlen($resultDados['BAIRRO_FORNECEDORES'])) <= 5):
            $erro = true;
            $mensagem = "BAIRRO FORNECEDORES deve ter no minímo 5";
        
        else:
            $sql = "SELECT ID_FORNECEDORES FROM fornecedores WHERE fornecedores.CNPJ_FORNECEDORES = :CNPJ_FORNECEDORES ";
            $resultado = $conn->getConn()->prepare($sql);
            $resultado->bindParam(':CNPJ_FORNECEDORES', $resultDados['CNPJ_FORNECEDORES']);
            $resultado->execute();

		    if(($resultado) AND ($resultado->rowCount() != 0)):
			    $erro = true;
			    $mensagem = "Este CNPJ  já está sendo utilizado";
            endif;

            $sql = "SELECT ID_FORNECEDORES FROM fornecedores WHERE fornecedores.EMAIL_FORNECEDORES = :EMAIL_FORNECEDORES ";
            $resultado = $conn->getConn()->prepare($sql);
            $resultado->bindParam(':EMAIL_FORNECEDORES', $resultDados['EMAIL_FORNECEDORES']);
            $resultado->execute();

		    if(($resultado) AND ($resultado->rowCount() != 0)):
			    $erro = true;
			    $mensagem = "Este e-mail já está sendo utilizado";
            endif;
        endif;

        if (!$erro):

        try {

            $sql = "UPDATE fornecedores SET NOME_FANTASIA_FORNECEDORES = :NOME_FANTASIA_FORNECEDORES, 
            RAZAO_SOCIAL_FORNECEDORES = :RAZAO_SOCIAL_FORNECEDORES, CNPJ_FORNECEDORES = :CNPJ_FORNECEDORES, 
            EMAIL_FORNECEDORES = :EMAIL_FORNECEDORES, CELULAR_FORNECEDORES = :CELULAR_FORNECEDORES, SEXO_FORNECEDORES = :SEXO_FORNECEDORES, DATA_NASCIMENTO_FORNECEDORES = :DATA_NASCIMENTO_FORNECEDORES, NACIONALIDADE_FORNECEDORES = :NACIONALIDADE_FORNECEDORES, CEP_FORNECEDORES = :CEP_FORNECEDORES, 
            CIDADE_FORNECEDORES = :CIDADE_FORNECEDORES, ENDERECO_CLIENTES = :ENDERECO_CLIENTES, ESTADO_FORNECEDORES = :ESTADO_FORNECEDORES, NUMERO_FORNECEDORES = :NUMERO_FORNECEDORES, BAIRRO_CLIENTES = :BAIRRO_CLIENTES,  COMPLEMENTO_CLIENTES = :COMPLEMENTO_CLIENTES  WHERE ID_FORNECEDORES = :ID_FORNECEDORES";

                $user_data = array(
                    ':ID_FORNECEDORES'                  => $resultDados['ID_FORNECEDORES'],
                    ':NOME_FANTASIA_FORNECEDORES'       => $resultDados["NOME_FANTASIA_FORNECEDORES"],
                    ':RAZAO_SOCIAL_FORNECEDORES'        => $resultDados["RAZAO_SOCIAL_FORNECEDORES"],
                    ':CNPJ_FORNECEDORES'                => $resultDados["CNPJ_FORNECEDORES"],
                    ':EMAIL_FORNECEDORES'               => $resultDados["EMAIL_FORNECEDORES"],
                    ':CELULAR_FORNECEDORES'             => $resultDados['CELULAR_FORNECEDORES'],
                    ':SEXO_FORNECEDORES'                => $resultDados["SEXO_FORNECEDORES"],
                    ':DATA_NASCIMENTO_FORNECEDORES'     => $resultDados["DATA_NASCIMENTO_FORNECEDORES"],
                    ':NACIONALIDADE_FORNECEDORES'       => $resultDados["NACIONALIDADE_FORNECEDORES"],
                    ':CEP_FORNECEDORES'                 => $resultDados["CEP_FORNECEDORES"],
                    ':CIDADE_FORNECEDORES'              => $resultDados["CIDADE_FORNECEDORES"],
                    ':ESTADO_FORNECEDORES'              => $resultDados["ESTADO_FORNECEDORES"],
                    ':ENDERECO_FORNECEDORES'            => $resultDados['ENDERECO_FORNECEDORES'],
                    ':NUMERO_FORNECEDORES'              => $resultDados["NUMERO_FORNECEDORES"],
                    ':BAIRRO_FORNECEDORES'              => $resultDados["BAIRRO_FORNECEDORES"],
                    ':COMPLEMENTO_FORNECEDORES'         => $resultDados["COMPLEMENTO_FORNECEDORES"]
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
