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
        $cpf = preg_replace("/[^0-9]/", "", $resultDados['CPF_ADMINISTRADOR']);
        $resultDados['CPF_ADMINISTRADOR'] = str_pad($cpf, 11, '0', STR_PAD_LEFT);
        /* RG */
        $rg = preg_replace("/[^0-9]/", "", $resultDados['RG_ADMINISTRADOR']);
        $resultDados['RG_ADMINISTRADOR'] = str_pad($rg, 9, '0', STR_PAD_LEFT);
        /* CELULAR */
        $celular = preg_replace("/[^0-9]/", "", $resultDados['CELULAR_ADMINISTRADOR']);
        $resultDados['CELULAR_ADMINISTRADOR'] = str_pad($celular, 11, '0', STR_PAD_LEFT);
        /* CEP */
        $cep = preg_replace("/[^0-9]/", "", $resultDados['CEP_ADMINISTRADOR']);
        $resultDados['CEP_ADMINISTRADOR'] = str_pad($cep, 8, '0', STR_PAD_LEFT);
        /* IDADE */
        $validade = explode('/', $resultDados['DATA_NASCIMENTO_ADMINISTRADOR']);
        $dataImplode = implode("-",$validade);
        $data = date_create($dataImplode);
        $idade = date_format($data, "Y-m-d");
        $data_atual = date('Y-m-d');
        $resultDados['DATA_NASCIMENTO_ADMINISTRADOR'] = $data_atual - $idade;
        /* CPF */
        $valida = validaCPF($resultDados['CPF_ADMINISTRADOR']);

        if (in_array('', $resultDados)):
            $erro = true;
            $mensagem = "Necessário preencher todos os campos";

        /* NOME ADMINISTRADOR */
        elseif (!preg_match("#[a-z]+#", $resultDados['NOME_ADMINISTRADOR'])):
            $erro = true;
            $mensagem = "O campo NOME ADMINISTRADOR precisa de pelo menos uma letra minúscula";
        
        elseif (stristr($resultDados['NOME_ADMINISTRADOR'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no NOME ADMINISTRADOR é inválido";

        elseif ((strlen($resultDados['NOME_ADMINISTRADOR'])) <= 5):
            $erro = true;
            $mensagem = "NOME ADMINISTRADOR deve ter no minímo 5";

        /* RG ADMINISTRADOR */
        elseif (!preg_match("#[0-9]+#", $resultDados['RG_ADMINISTRADOR'])):
            $erro = true;
            $mensagem = "O RG ADMINISTRADOR deve incluir pelo menos um número!";
        
        elseif (stristr($resultDados['RG_ADMINISTRADOR'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no RG ADMINISTRADOR é inválido";
        
        elseif(!is_numeric($resultDados['RG_ADMINISTRADOR'])):
            $erro = true;
            $mensagem = "RG ADMINISTRADOR somente números";
        
        elseif (((strlen($resultDados['RG_ADMINISTRADOR'])) < 9)):
            $erro = true;
            $mensagem = " RG ADMINISTRADOR  deve ter no minímo 9 caracteres";

        /* CPF ADMINISTRADOR */
        elseif (!preg_match("#[0-9]+#", $resultDados['CPF_ADMINISTRADOR'])):
            $erro = true;
            $mensagem = "O CPF ADMINISTRADOR deve incluir pelo menos um número!";
        
        elseif (stristr($resultDados['CPF_ADMINISTRADOR'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no CPF ADMINISTRADOR é inválido";
        
        elseif(!is_numeric($resultDados['CPF_ADMINISTRADOR'])):
            $erro = true;
            $mensagem = "CPF ADMINISTRADOR somente números";
        
        elseif ($valida === false):
            $erro = true;
            $mensagem = " CPF ADMINISTRADOR inválido";
        
        /* SEXO ADMINISTRADOR */
        elseif (!preg_match("#[a-z]+#", $resultDados['SEXO_ADMINISTRADOR'])):
            $erro = true;
            $mensagem = "O campo SEXO ADMINISTRADOR precisa de pelo menos uma letra minúscula";
        
        elseif (stristr($resultDados['SEXO_ADMINISTRADOR'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no SEXO ADMINISTRADOR é inválido";

        elseif ((strlen($resultDados['SEXO_ADMINISTRADOR'])) >= 8 && 9 <= strlen($resultDados['SEXO_ADMINISTRADOR'])):
            $erro = true;
            $mensagem = "SEXO ADMINISTRADOR deve ter no minímo 8  e máximo 9";
        
        /* DATA_NASCIMENTO_ADMINISTRADOR */
        elseif (!checkdate($validade[1], $validade[0], $validade[2])):
            $erro = true;
            $mensagem = "DATA INVALIDA";

        elseif ($resultDados['DATA_NASCIMENTO_ADMINISTRADOR'] < 18):
            $erro = true;
            $mensagem = "Somente para maiores de 18 anos";

        /* CELULAR ADMINISTRADOR */
        elseif (!preg_match("#[0-9]+#", $resultDados['CELULAR_ADMINISTRADOR'])):
            $erro = true;
            $mensagem = "O CELULAR ADMINISTRADOR deve incluir pelo menos um número!";
        
        elseif (stristr($resultDados['CELULAR_ADMINISTRADOR'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no CELULAR ADMINISTRADOR é inválido";
        
        elseif(!is_numeric($resultDados['CELULAR_ADMINISTRADOR'])):
            $erro = true;
            $mensagem = "CELULAR ADMINISTRADOR somente números";
        
        elseif ((strlen($resultDados['CELULAR_ADMINISTRADOR'])) < 11):
            $erro = true;
            $mensagem = " CELULAR ADMINISTRADOR deve ter no máximo 11";
        
        /* EMAIL ADMINISTRADOR */
        elseif (!preg_match("#[a-z]+#", $resultDados['EMAIL_ADMINISTRADOR'])):
            $erro = true;
            $mensagem = "O campo EMAIL ADMINISTRADOR precisa de pelo menos uma letra minúscula";
        
        elseif (stristr($resultDados['EMAIL_ADMINISTRADOR'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no EMAIL ADMINISTRADOR é inválido";

        elseif ((!isset ($resultDados['EMAIL_ADMINISTRADOR']) || !filter_var($resultDados['EMAIL_ADMINISTRADOR'], FILTER_VALIDATE_EMAIL)) && !$erro):
            $erro = true;
            $mensagem = "O campo EMAIL ADMINISTRADOR precisa de um endereço válido";

        /* NACIONALIDADE ADMINISTRADOR */
        elseif (!preg_match("#[a-z]+#", $resultDados['NACIONALIDADE_ADMINISTRADOR'])):
            $erro = true;
            $mensagem = "O campo NACIONALIDADE ADMINISTRADOR precisa de pelo menos uma letra minúscula";
        
        elseif (stristr($resultDados['NACIONALIDADE_ADMINISTRADOR'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no NACIONALIDADE ADMINISTRADOR é inválido";

        elseif ((strlen($resultDados['NACIONALIDADE_ADMINISTRADOR'])) <= 5):
            $erro = true;
            $mensagem = "NACIONALIDADE ADMINISTRADOR deve ter no minímo 5";
        
        /* COMPLEMENTO ADMINISTRADOR */
        elseif (!preg_match("#[a-z]+#", $resultDados['COMPLEMENTO_ADMINISTRADOR'])):
            $erro = true;
            $mensagem = "O campo COMPLEMENTO ADMINISTRADOR precisa de pelo menos uma letra minúscula";
        
        elseif (stristr($resultDados['COMPLEMENTO_ADMINISTRADOR'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no COMPLEMENTO ADMINISTRADOR é inválido";

        elseif ((strlen($resultDados['COMPLEMENTO_ADMINISTRADOR'])) <= 3):
            $erro = true;
            $mensagem = "COMPLEMENTO ADMINISTRADOR deve ter no minímo 5";

        /* CEP ADMINISTRADOR */
        elseif (!preg_match("#[0-9]+#", $resultDados['CEP_ADMINISTRADOR'])):
            $erro = true;
            $mensagem = "O CEP ADMINISTRADOR deve incluir pelo menos um número!";
        
        elseif (stristr($resultDados['CEP_ADMINISTRADOR'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no CEP ADMINISTRADOR é inválido";
        
        elseif(!is_numeric($resultDados['CEP_ADMINISTRADOR'])):
            $erro = true;
            $mensagem = "CEP ADMINISTRADOR somente números";
        
        elseif (((strlen($resultDados['CEP_ADMINISTRADOR'])) < 8)):
            $erro = true;
            $mensagem = " CEP ADMINISTRADOR deve ter no minímo 8 caracteres";
        
        /* CIDADE ADMINISTRADOR */
        elseif (!preg_match("#[a-z]+#", $resultDados['CIDADE_ADMINISTRADOR'])):
            $erro = true;
            $mensagem = "O campo CIDADE ADMINISTRADOR precisa de pelo menos uma letra minúscula";
        
        elseif (stristr($resultDados['CIDADE_ADMINISTRADOR'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no CIDADE ADMINISTRADOR é inválido";

        elseif ((strlen($resultDados['CIDADE_ADMINISTRADOR'])) <= 2):
            $erro = true;
            $mensagem = "CIDADE ADMINISTRADOR deve ter no minímo 2";

        /* ESTADO ADMINISTRADOR */
        elseif (!preg_match("#[A-Z]+#", $resultDados['ESTADO_ADMINISTRADOR'])):
            $erro = true;
            $mensagem = "O campo ESTADO ADMINISTRADOR precisa de pelo menos uma letra minúscula";
        
        elseif (stristr($resultDados['ESTADO_ADMINISTRADOR'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no ESTADO ADMINISTRADOR é inválido";

        elseif ((strlen($resultDados['ESTADO_ADMINISTRADOR'])) < 2):
            $erro = true;
            $mensagem = "ESTADO ADMINISTRADOR deve ter no minímo 2";

        /* ENDERECO ADMINISTRADOR */
        elseif (!preg_match("#[a-z]+#", $resultDados['ENDERECO_ADMINISTRADOR'])):
            $erro = true;
            $mensagem = "O campo ENDERECO ADMINISTRADOR precisa de pelo menos uma letra minúscula";
        
        elseif (stristr($resultDados['ENDERECO_ADMINISTRADOR'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no ENDERECO ADMINISTRADOR é inválido";

        elseif ((strlen($resultDados['ENDERECO_ADMINISTRADOR'])) <= 5):
            $erro = true;
            $mensagem = "ENDERECO ADMINISTRADOR deve ter no minímo 5";

        /* NUMERO ADMINISTRADOR */
        elseif (!preg_match("#[0-9]+#", $resultDados['NUMERO_ADMINISTRADOR'])):
            $erro = true;
            $mensagem = "O NUMERO ADMINISTRADOR deve incluir pelo menos um número!";
        
        elseif (stristr($resultDados['NUMERO_ADMINISTRADOR'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no NÚMERO ADMINISTRADOR é inválido";
        
        elseif(!is_numeric($resultDados['NUMERO_ADMINISTRADOR'])):
            $erro = true;
            $mensagem = "NÚMERO ADMINISTRADOR somente números";
        
        elseif (((strlen($resultDados['NUMERO_ADMINISTRADOR'])) < 1)):
            $erro = true;
            $mensagem = " NÚMERO ADMINISTRADOR deve ter no minímo 1 caracteres";

        /* BAIRRO ADMINISTRADOR */
        elseif (!preg_match("#[a-z]+#", $resultDados['BAIRRO_ADMINISTRADOR'])):
            $erro = true;
            $mensagem = "O campo BAIRRO ADMINISTRADOR precisa de pelo menos uma letra minúscula";
        
        elseif (stristr($resultDados['BAIRRO_ADMINISTRADOR'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no BAIRRO ADMINISTRADOR é inválido";

        elseif ((strlen($resultDados['BAIRRO_ADMINISTRADOR'])) <= 5):
            $erro = true;
            $mensagem = "BAIRRO ADMINISTRADOR deve ter no minímo 5";
        
        else:
            $sql = "SELECT ID_ADMINISTRADOR FROM ADMINISTRADOR WHERE ADMINISTRADOR.CPF_ADMINISTRADOR = :CPF_ADMINISTRADOR ";
            $resultado = $conn->getConn()->prepare($sql);
            $resultado->bindParam(':CPF_ADMINISTRADOR', $resultDados['CPF_ADMINISTRADOR']);
            $resultado->execute();

		    if(($resultado) AND ($resultado->rowCount() != 0)):
			    $erro = true;
			    $mensagem = "Este CPF já está sendo utilizado";
            endif;

            $sql = "SELECT ID_ADMINISTRADOR FROM ADMINISTRADOR WHERE ADMINISTRADOR.EMAIL_ADMINISTRADOR = :EMAIL_ADMINISTRADOR ";
            $resultado = $conn->getConn()->prepare($sql);
            $resultado->bindParam(':EMAIL_ADMINISTRADOR', $resultDados['EMAIL_ADMINISTRADOR']);
            $resultado->execute();

		    if(($resultado) AND ($resultado->rowCount() != 0)):
			    $erro = true;
			    $mensagem = "Este e-mail já está sendo utilizado";
            endif;
        endif;

        if (!$erro):
            try {
                $sql = "UPDATE administrador SET NOME_ADMINISTRADOR = :NOME_ADMINISTRADOR, RG_ADMINISTRADOR = :RG_ADMINISTRADOR, CPF_ADMINISTRADOR = :CPF_ADMINISTRADOR, CELULAR_ADMINISTRADOR = :CELULAR_ADMINISTRADOR, CIDADE_ADMINISTRADOR = :CIDADE_ADMINISTRADOR,
                DATA_NASCIMENTO_ADMINISTRADOR = :DATA_NASCIMENTO_ADMINISTRADOR, SEXO_ADMINISTRADOR = :SEXO_ADMINISTRADOR, EMAIL_ADMINISTRADOR = :EMAIL_ADMINISTRADOR, CEP_ADMINISTRADOR = :CEP_ADMINISTRADOR, ESTADO_ADMINISTRADOR = :ESTADO_ADMINISTRADOR, BAIRRO_ADMINISTRADOR = :BAIRRO_ADMINISTRADOR, ENDERECO_ADMINISTRADOR = :ENDERECO_ADMINISTRADOR, COMPLEMENTO_ADMINISTRADOR = :COMPLEMENTO_ADMINISTRADOR, NACIONALIDADE_ADMINISTRADOR = :NACIONALIDADE_ADMINISTRADOR  WHERE ID_ADMINISTRADOR = :ID_ADMINISTRADOR";

                $user_data = array(
                    ':ID_ADMINISTRADOR'                  => $resultDados['ID_ADMINISTRADOR'],
                    ':NOME_ADMINISTRADOR'                => $resultDados["NOME_ADMINISTRADOR"],
                    ':RG_ADMINISTRADOR'                  => $resultDados["RG_ADMINISTRADOR"],
                    ':CPF_ADMINISTRADOR'                 => $resultDados["CPF_ADMINISTRADOR"],
                    ':SEXO_ADMINISTRADOR'                => $resultDados["SEXO_ADMINISTRADOR"],
                    ':DATA_NASCIMENTO_ADMINISTRADOR'     => $resultDados['DATA_NASCIMENTO_ADMINISTRADOR'],
                    ':EMAIL_ADMINISTRADOR'               => $resultDados["EMAIL_ADMINISTRADOR"],
                    ':CELULAR_ADMINISTRADOR'             => $resultDados["CELULAR_ADMINISTRADOR"],
                    ':CEP_ADMINISTRADOR'                 => $resultDados["CEP_ADMINISTRADOR"],
                    ':CIDADE_ADMINISTRADOR'              => $resultDados["CIDADE_ADMINISTRADOR"],
                    ':ESTADO_ADMINISTRADOR'              => $resultDados["ESTADO_ADMINISTRADOR"],
                    ':ENDERECO_ADMINISTRADOR'            => $resultDados["ENDERECO_ADMINISTRADOR"],
                    ':NUMERO_ADMINISTRADOR'              => $resultDados['NUMERO_ADMINISTRADOR'],
                    ':BAIRRO_ADMINISTRADOR'              => $resultDados["BAIRRO_ADMINISTRADOR"],
                    ':NACIONALIDADE_ADMINISTRADOR'       => $resultDados["NACIONALIDADE_ADMINISTRADOR"],
                    ':COMPLEMENTO_ADMINISTRADOR'         => $resultDados["COMPLEMENTO_ADMINISTRADOR"]
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
    
            else:
                $data = array('mensagem' => $mensagem);
            endif;
        endif;
    
        echo json_encode($data);
?>
