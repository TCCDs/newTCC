<?php
    session_start();
    include_once ("../../../../server/Connect.php");
    $conn = new Conn();

    $requestData = $_REQUEST;

    if ($requestData):
        $erro = false;
        $mensagem = '';

        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        $dados_st = array_map('strip_tags', $dados);
        $dados_strc = array_map('stripcslashes', $dados_st);
        $dados_strs = array_map('stripslashes', $dados_strc);
        $resultDados = array_map('trim', $dados_strs);

        /* validade */
        $validade = explode('/', $resultDados['VALIDADE_PRODUTOS']);
        $dataImplode = implode("-",$validade);
        $data = date_create($dataImplode);
        $resultDados['VALIDADE_PRODUTOS'] = date_format($data, "Y-m-d");

        $data_atual = date('Y-m-d');

        if (in_array('', $resultDados)):
            $erro = true;
            $mensagem = "Necessário preencher todos os campos";

            /* NOME PRODUTOS*/
        elseif (!preg_match("#[a-z]+#", $resultDados['NOME_PRODUTOS'])):
            $erro = true;
            $mensagem = "O campo nome produtos precisa de pelo menos uma letra minúscula";
        
        elseif (stristr($resultDados['NOME_PRODUTOS'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no nome é inválido";

        elseif ((strlen($resultDados['NOME_PRODUTOS'])) <= 3):
            $erro = true;
            $mensagem = "nome produtos deve ter no minímo 3";

            /* PRECO CUSTO */
       elseif (!preg_match("#[0-9]+#", $resultDados['PRECO_CUSTO_PRODUTOS'])):
            $erro = true;
            $mensagem = "O preço custo deve incluir pelo menos um número!";
        
        elseif (stristr($resultDados['PRECO_CUSTO_PRODUTOS'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no preco custo é inválido";
        
        elseif (!is_numeric($resultDados['PRECO_CUSTO_PRODUTOS'])):
            $erro = true;
            $mensagem = "PRECO CUSTO somente números";

        /* PRECO VENDA */
        elseif (!preg_match("#[0-9]+#", $resultDados['PRECO_VENDA_PRODUTOS'])):
            $erro = true;
            $mensagem = "O preço venda deve incluir pelo menos um número!";
        
        elseif (stristr($resultDados['PRECO_VENDA_PRODUTOS'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no preco custo é inválido";
        
        elseif(!is_numeric($resultDados['PRECO_VENDA_PRODUTOS'])):
            $erro = true;
            $mensagem = "PRECO VENDA somente números";

        /* PESO */
        elseif (!preg_match("#[a-z]+#", $resultDados['PESO_PRODUTOS'])):
            $erro = true;
            $mensagem = "O campo peso precisa de pelo menos uma letra minúscula";
            
        elseif (stristr($resultDados['PESO_PRODUTOS'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no nome é inválido";
    
        elseif ((strlen($dados['PESO_PRODUTOS'])) <= 2):
            $erro = true;
            $mensagem = "Peso deve ter no minímo 3";

        /* Validade */
        elseif (!checkdate($validade[1], $validade[0], $validade[2])):
            $erro = true;
            $mensagem = "DATA INVÁLIDA";
        elseif (strtotime($resultDados['VALIDADE_PRODUTOS']) < strtotime($data_atual)):
            $erro = true;
            $mensagem = "PRODUTO VENCIDO";
        elseif (strtotime($resultDados['VALIDADE_PRODUTOS']) == strtotime($data_atual)):
            $erro = true;
            $mensagem = "PRODUTO COM VENCIMENTO HOJE";

        /* DESCRICAO */
        elseif (!preg_match("#[a-z]+#", $resultDados['DESCRICAO_PRODUTOS'])):
            $erro = true;
            $mensagem = "O campo descrição produtos precisa de pelo menos uma letra minúscula";
        
        elseif (stristr($resultDados['DESCRICAO_PRODUTOS'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no nome é inválido";

        elseif ((strlen($dados['DESCRICAO_PRODUTOS'])) <= 5):
            $erro = true;
            $mensagem = "descrição deve ter no minímo 3";

        /* QR CODE */
        elseif (!preg_match("#[0-9]+#", $resultDados['QR_CODE_PRODUTOS'])):
            $erro = true;
            $mensagem = "O QR CODE deve incluir pelo menos um número!";
        
        elseif (stristr($resultDados['QR_CODE_PRODUTOS'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no QR CODE é inválido";
        
        elseif(!is_numeric($resultDados['QR_CODE_PRODUTOS'])):
            $erro = true;
            $mensagem = "QR CODE somente números";
        
        elseif (((strlen($resultDados['QR_CODE_PRODUTOS'])) < 8)):
            $erro = true;
            $mensagem = " QR CODE  deve ter no minímo 8 caracteres";

        /* ESTOQUE */
        elseif (!preg_match("#[0-9]+#", $resultDados['ESTOQUE_PRODUTOS'])):
            $erro = true;
            $mensagem = "O estoque deve incluir pelo menos um número!";
        
        elseif (stristr($resultDados['ESTOQUE_PRODUTOS'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado no estoque é inválido";
        
        elseif(!is_numeric($resultDados['ESTOQUE_PRODUTOS'])):
            $erro = true;
            $mensagem = "estoque somente números";
        
        elseif ($resultDados['ESTOQUE_PRODUTOS'] < 50):
            $erro = true;
            $mensagem = "O estoque deve ter no minímo 50";

        /* CATEGORIAS PRODUTOS */
        elseif (!preg_match("#[a-z]+#", $resultDados['CATEGORIAS_PRODUTOS'])):
            $erro = true;
            $mensagem = "O campo categorias produtos precisa de pelo menos uma letra minúscula";
        
        elseif (stristr($resultDados['CATEGORIAS_PRODUTOS'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado na categorias produtos é inválido";

        elseif ((strlen($dados['CATEGORIAS_PRODUTOS'])) <= 3):
            $erro = true;
            $mensagem = "categorias produtos deve ter no minímo 3";

        /* CORREDOR PRODUTOS */
        elseif (!preg_match("#[A-Z]+#", $resultDados['CORREDOR_PRODUTOS'])):
            $erro = true;
            $mensagem = "O campo CORREDOR PRODUTOS precisa de pelo menos uma letra maiúscula";
        
        elseif (stristr($resultDados['CORREDOR_PRODUTOS'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado na CORREDOR PRODUTOS é inválido";

        elseif ((strlen($dados['CORREDOR_PRODUTOS'])) > 1):
            $erro = true;
            $mensagem = "CORREDOR PRODUTOS deve ter 1 letra";

        /* PRATILEIRA PRODUTOS */
        elseif (!preg_match("#[A-Z]+#", $resultDados['PRATILEIRA_PRODUTOS'])):
            $erro = true;
            $mensagem = "O campo PRATILEIRA PRODUTOS precisa de pelo menos uma letra maiúscula";
        
        elseif (stristr($resultDados['PRATILEIRA_PRODUTOS'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado na PRATILEIRA PRODUTOS é inválido";

        elseif ((strlen($dados['PRATILEIRA_PRODUTOS'])) > 1):
            $erro = true;
            $mensagem = "PRATILEIRA PRODUTOS deve ter 1 letra";

        /* LOTE */
        elseif ((strlen($resultDados['LOTE_PRODUTOS'])) >= 4 && 12 <= strlen($resultDados['LOTE_PRODUTOS'])):
            $erro = true;
            $mensagem = "O LOTE deve ter no minímo 4 caracteres e no máximo 12";

        elseif (stristr($resultDados['LOTE_PRODUTOS'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado na LOTE é inválido";

        elseif (!preg_match("#[0-9]+#", $resultDados['LOTE_PRODUTOS'])):
            $erro = true;
            $mensagem = "O LOTE deve incluir pelo menos um número!";
                
        elseif (!preg_match("#[a-z]+#", $resultDados['LOTE_PRODUTOS'])):
            $erro = true;
            $mensagem = "O LOTE deve incluir pelo menos um letra maiúscula!";

        /* STATUS PRODUTOS */
        elseif (!preg_match("#[A-Z]+#", $resultDados['STATUS_PRODUTOS'])):
            $erro = true;
            $mensagem = "O campo STATUS PRODUTOS precisa de pelo menos uma letra maiúscula";
        
        elseif (stristr($resultDados['STATUS_PRODUTOS'], "'")):
            $erro = true;
            $mensagem = "Caracter ( ' ) utilizado na STATUS PRODUTOS é inválido";

        elseif ((strlen($dados['STATUS_PRODUTOS'])) > 1):
            $erro = true;
            $mensagem = "STATUS PRODUTOS deve ter 1 letra";

        else:
            $sql = "SELECT ID_PRODUTOS FROM produtos WHERE QR_CODE_PRODUTOS = :QR_CODE_PRODUTOS ";
            $resultado = $conn->getConn()->prepare($sql);
            $resultado->bindParam(':QR_CODE_PRODUTOS', $resultDados['QR_CODE_PRODUTOS']);
            $resultado->execute();

		    if(($resultado) AND ($resultado->rowCount() != 0)):
			    $erro = true;
			    $mensagem = "QR CODE JÁ EXISTE";
            endif;
        endif;

        $resultDados['LOTE_PRODUTOS'] = strtoupper($resultDados['LOTE_PRODUTOS']);
        $resultDados['NOME_PRODUTOS'] = ucwords($resultDados['NOME_PRODUTOS']);
        $resultDados['PESO_PRODUTOS'] = strtoupper($resultDados['PESO_PRODUTOS']);

        if (!$erro):
            try{
                $sql = "INSERT INTO produtos (NOME_PRODUTOS, PRECO_CUSTO_PRODUTOS, PRECO_VENDA_PRODUTOS, PESO_PRODUTOS, VALIDADE_PRODUTOS, DESCRICAO_PRODUTOS, ID_FORNECEDORES_PRODUTOS, ID_MARCAS_PRODUTOS, QR_CODE_PRODUTOS, ESTOQUE_PRODUTOS, CATEGORIAS_PRODUTOS, CORREDOR_PRODUTOS, PRATILEIRA_PRODUTOS, LOTE_PRODUTOS, STATUS_PRODUTOS)
                VALUES (:NOME_PRODUTOS, :PRECO_CUSTO_PRODUTOS, :PRECO_VENDA_PRODUTOS, :PESO_PRODUTOS, :VALIDADE_PRODUTOS, :DESCRICAO_PRODUTOS, :ID_FORNECEDORES_PRODUTOS, :ID_MARCAS_PRODUTOS, :QR_CODE_PRODUTOS, :ESTOQUE_PRODUTOS, :CATEGORIAS_PRODUTOS, :CORREDOR_PRODUTOS, :PRATILEIRA_PRODUTOS, :LOTE_PRODUTOS, :STATUS_PRODUTOS)
                    ";
    
                $user_data = array(
                    ':NOME_PRODUTOS'                => $resultDados["NOME_PRODUTOS"],
                    ':PRECO_CUSTO_PRODUTOS'         => $resultDados["PRECO_CUSTO_PRODUTOS"],
                    ':PRECO_VENDA_PRODUTOS'         => $resultDados["PRECO_VENDA_PRODUTOS"],
                    ':PESO_PRODUTOS'                => $resultDados["PESO_PRODUTOS"],
                    ':VALIDADE_PRODUTOS'            => $resultDados['VALIDADE_PRODUTOS'],
                    ':DESCRICAO_PRODUTOS'           => $resultDados["DESCRICAO_PRODUTOS"],
                    ':ID_FORNECEDORES_PRODUTOS'     => $resultDados["ID_FORNECEDORES_PRODUTOS"],
                    ':ID_MARCAS_PRODUTOS'           => $resultDados["ID_MARCAS_PRODUTOS"],
                    ':QR_CODE_PRODUTOS'             => $resultDados["QR_CODE_PRODUTOS"],
                    ':ESTOQUE_PRODUTOS'             => $resultDados["ESTOQUE_PRODUTOS"],
                    ':CATEGORIAS_PRODUTOS'          => $resultDados["CATEGORIAS_PRODUTOS"],
                    ':CORREDOR_PRODUTOS'            => $resultDados["CORREDOR_PRODUTOS"],
                    ':PRATILEIRA_PRODUTOS'          => $resultDados["PRATILEIRA_PRODUTOS"],
                    ':LOTE_PRODUTOS'                => $resultDados['LOTE_PRODUTOS'],
                    ':STATUS_PRODUTOS'              => $resultDados["STATUS_PRODUTOS"]
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