<?php
    $connect = mysqli_connect("localhost", "root", "", "new_shopping");  

    $qr_code = $_POST["qrcode"];
    
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