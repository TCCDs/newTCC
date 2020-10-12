<?php
    session_start();
    $total_price = 0;

    $output = '
        <div class="table-responsive" id="order_table">
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>  
                            <th scope="col">Nome do produto</th>  
                            <th scope="col">Quantidade</th>  
                            <th scope="col">Preço</th>  
                            <th scope="col">Total</th>  
                            <th scope="col">Ação</th>  
                    </tr>
                </thead>
    ';

    if(!empty($_SESSION["shopping_cart"])) {
        foreach($_SESSION["shopping_cart"] as $keys => $values) {
            $output .= '
                <tr>
                    <td  scope="col">'.$values["product_name"].'</td>
                    <td  scope="col">'.$values["product_quantity"].'</td>
                    <td scope="col" align="right">$ '.$values["product_price"].'</td>
                    <td scope="col" align="right">$ '.number_format($values["product_quantity"] * $values["product_price"], 2).'</td>
                    <td scope="col"><button name="delete" class="btn btn-danger btn-xs delete" id="'. $values["product_id"].'"><i class="mdi mdi-trash-can-outline"></i>
                    </button></td>
                </tr>
            ';

            $total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);
        }

        $output .= '
            <tr>  
                <td colspan="3" align="right">Total</td>  
                <td align="right">$ '.number_format($total_price, 2).'</td>  
                <td></td>  
            </tr>
        ';
    } else {

        $output .= '
            <tr>
                <td colspan="5" align="center">                
                    Seu carrinho está vazio!
                </td>
            </tr>
        ';
    }

    $output .= '</table></div>';

    $data = array(
        'cart_details'  => $output,
        'total_price'  => '$' . number_format($total_price, 2),
    );

    echo json_encode($data);

?>