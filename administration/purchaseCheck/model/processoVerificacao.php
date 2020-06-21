<?php
    $connect = mysqli_connect("localhost", "root", "", "new_shopping");  

    $qr_code = $_POST["qrcode"];
   
    $query = 'SELECT 
                compras_pagamentos.NOME_CARTAO,
                compras_pagamentos.NUMERO_CARTAO,
                compras_pagamentos.STATUS_PAGAMENTO,
                compras_pagamentos.CODIGO_PAGAMENTO,
                
                compras.CODIGO_COMPRAS,
                compras.VALOR_COMPRAS,
                compras.STATUS_COMPRAS,
                compras.DATA_CAD
                
                /*clientes.NOME_CLIENTES,
                clientes.CEP_CLIENTES,
                clientes.CIDADE_CLIENTES,
                clientes.ESTADO_CLIENTES,
                clientes.ENDERECO_CLIENTES,
                clientes.NUMERO_CLIENTES,
                clientes.BAIRRO_CLIENTES*/
            FROM 
                compras_pagamentos
            INNER JOIN compras_itens ON compras_pagamentos.ID_COMPRAS_ITENS = compras_itens.ID_COMPRA_ITENS
            INNER JOIN compras ON compras_itens.ID_COMPRAS = compras.ID_COMPRAS
            INNER JOIN clientes ON (compras.ID_CLIENTES_COMPRAS = clientes.ID_CLIENTES) 
            WHERE QR_CODE = "'.$qr_code.'" 
        '; 
    $query = 'SELECT * FROM compra_itens WHERE QR_CODE = "'.$qr_code.'" '; 
    $result = mysqli_query($connect, $query);  
?>

<div class="container">
        <div class="row">
            <div class="col-md-8" style="border-right:1px solid #ddd;">
                <div class="col-md-4">
                    <div class="table-responsive" id="order_table">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    while($resultado = mysqli_fetch_assoc($result)) {  
                                ?>
                                <tr>
                                    <td> <?php echo $resultado['NOME_PRODUTOS'];?> </td>
                                    <td> <?php echo $resultado['QUANTIDADE_PRODUTOS'];?> </td>
                                    <td> <?php echo $resultado['PRECO_PRODUTOS'];?> </td>
                                </tr>
                                        
                                        
                                <?php 
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>